<?php

namespace App\Http\Controllers;

use App\Blog;
use Validator;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class BlogpostController extends Controller
{
    public function index(){
        $posts=Blog::all();
        $post_collection=new Collection($posts);
        $blog_id_list=$post_collection->lists('id');
        $id_arr=array();
        foreach($blog_id_list as $id){
            array_push($id_arr,$id);
        }
        $rand_id=mt_rand(0,count($id_arr)-1);
        $banner_post=Blog::findOrFail($id_arr[$rand_id]);
        //($banner_post->toArray());
        return view('blog.homepage',compact('posts'))->with(['banner_post'=>$banner_post]);
    }
    public function about( ){
        return view('blog.about');
    }
    public function create(){
        return view('blog.create');
    }
    public function edit($id){
        $post=Blog::findOrFail($id);
        return view('blog.edit')->withPost($post);
    }
    public function store(Request $request){
        $rules=[
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'mimes:jpeg,bmp,png,gif|max:1024'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('blog/create')->withErrors($validator)->withInput($request->all());
        }else{
            $data=$request->all();
            if($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');

                $file->move('postthumbnails', $file->getClientOriginalName());
                $data['thumbnail']=$file->getClientOriginalName();
            }
            $data['created_by']=Auth::user()->id;
            //dd($data);
            Blog::create($data);

            return redirect('blog/create')->with('success','The article has been published successfully');
        }
    }


    public function update(Request $request){
        $rules=[
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'mimes:jpeg,bmp,png,gif|max:1024'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('blog/edit/'+$request->input('id'))->withErrors($validator)->withInput($request->all());
        }else{

            $blog=Blog::findOrFail($request->input('id'));
            $blog->title=$request->input('title');
            $blog->content=$request->input('content');
            if($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');

                $file->move('postthumbnails', $file->getClientOriginalName());
                $blog->thumbnail=$file->getClientOriginalName();

            }
            //dd($blog);
            $blog->save();

            return redirect('blog/posts')->with('success','The article has been updated successfully');
        }
    }


    public function show($id){
        $blog=Blog::findOrFail($id);
        $author=User::findOrFail($blog->created_by);
        return view('blog.single',compact('blog'))->with(['author'=>$author]);
    }
    public function allposts(){
        $posts=Blog::paginate(5);
        return view('blog.allposts')->with(['posts'=>$posts]);
    }
}
