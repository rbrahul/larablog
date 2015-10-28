<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BlogpostController@index');
Route::get('blog',['uses'=>'BlogpostController@index']);
Route::get('about',['uses'=>'BlogpostController@about']);
Route::get('user/register',['uses'=>'UserController@create']);
Route::post('user/save',['uses'=>'UserController@store']);
Route::get('user/login',['uses'=>'UserController@login']);
Route::get('user/logout',['uses'=>'UserController@logout']);
Route::post('user/signin',['uses'=>'UserController@signin']);
Route::get('blog/create',['uses'=>'BlogpostController@create']);
Route::get('blog/edit/{id}',['uses'=>'BlogpostController@edit']);
Route::post('blog/save',['uses'=>'BlogpostController@store']);
Route::post('blog/update',['uses'=>'BlogpostController@update']);
Route::get('blog/show/{post}',['uses'=>'BlogpostController@show']);
Route::get('blog/posts',['uses'=>'BlogpostController@allposts']);
Route::get('gallery','GalleryController@index');
Route::post('gallery/ajaxtest','GalleryController@ajaxtest');
Route::get('gallery/getimages','GalleryController@getimages');

