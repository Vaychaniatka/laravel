<?php

use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|*/



Route::get('/','PostController@index');
Route::get('/post', ['as'=>'post.index', 'uses'=>'PostController@index']);
Route::put('/post', ['as'=>'post.update','uses'=>'PostController@update']);
Route::post('/post',['as'=>'post.store', 'uses' =>'PostController@store'] );
Route::get('/post/add', ['as'=>'post.create', 'uses'=>'PostController@create']);
Route::get('/post/unpublished',['as'=>'post.unpublished', 'uses'=>'PostController@getUnpublished']);
Route::get('/post/all',['as'=>'post.viewAll', 'uses'=>'PostController@viewAll']);
Route::get('/post/{post}',['as'=>'post.show','uses'=>'PostController@show']);
//Route::put('/post/{post}/edit', ['as'=>'post.update','uses'=>'PostController@update']);
Route::get('/post/{post}/edit', ['as'=>'post.edit','uses'=>'PostController@edit']);


//$router->resource('post','PostController');

//Route::get('/post/unpublished','PostController@getUnpublished');
//

Auth::routes();

Route::get('/home', 'HomeController@index');
