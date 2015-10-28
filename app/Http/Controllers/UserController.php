<?php

namespace App\Http\Controllers;


use Validator;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create(){
        return view('user.registration');
    }
    public  function store(Request $request){
        $rules=[
            'name'=>'required|max:100',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|confirmed'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('user/register')->withErrors($validator)->withInput($request->all());
        }else{
            $data=$request->all();
            $data['password']=bcrypt($request->input('password'));
            User::create($data);
           return redirect('user/register')->with('success','User has been registered successfully.');
        }
    }
    public  function login(){
        return view('login');
    }
    public  function signin(Request $request){
        $rules=[
            'email'=>'required|email',
            'password'=>'required',
        ];
        //dd($request->all());
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('user/login')->withErrors($validator)->withInput($request->all());
        }else{
            $credintials=[
                'email'=>$request->input('email'),
                'password'=>$request->input('password')
            ];

            if(Auth::attempt($credintials)){
                return redirect()->intended('blog');
            }else{
                return redirect('user/login')->with('error_msg','Email or Password does not match')->withInput($request->except('password'));
            }
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('user/login');
    }
}
