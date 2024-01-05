<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('photos/home','NewController@index1');
Route::get('/','NewController@index1');
Route::get('photos/abc','NewController@search');
Route::get('photos/addwallpaper','NewController@addwall');
Route::get('photos/latestwallpaper','NewController@latest');
Route::get('photos/randomwallpaper','NewController@random');
// 
//
//
Route::resource('photos/categorydetail', 'NewController');
Route::get('photos/categorydetail/edit','NewController@edit');


//
Route::get('photos/categories','NewController@categories');
//Route::get('photos/categorydetail','NewController@categorydetail');
//Route::post('photos/addwallpaper','NewController@store');
//Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('photos/addwallpaper','NewController@imageUploadPost');
Route::get('photos/walldetail','NewController@walldetail');
Route::resource('photos', 'PhotoController');
//Route::get('/home', 'PhotoController@home');

