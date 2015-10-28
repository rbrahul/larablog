<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(){
        $images=Gallery::all();
        return view('gallery.gallery',compact('images'));
    }

    public function ajaxtest(Request $request){
        $file_nums=count($request->file("images"));
        $rules=[
            'captions'=>'required',

        ];
      $validator=Validator::make($request->all(),$rules);
           if($validator->fails()){
             return  $validator->errors()->all();

           }else {
               for ($i = 0; $i < $file_nums; $i++) {
                   $file = $request->file("images")[$i];
                   $file->move("galleryimages", $file->getClientOriginalName());
                   $data = ["caption" => $request->input('captions')[$i], "image_name" => $file->getClientOriginalName()];

                   Gallery::create($data);
               }
                  return response()->json(["msg"=>"success"]);
           }
    }

    public  function getimages(){
        return response()->json(Gallery::all());
    }
}
