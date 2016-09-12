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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',array('uses'=>'authenticate@showLogin'));
Route::post('/login',array('uses' => 'authenticate@doLogin')
	);
Route::get('/signup',function(){
	return view("signupForm");
});
Route::post('/signup','newUser@signup');	
Route::get('/profile',function(){
	return view('profile');
	});
Route::post('/profile','User@registerWebsite');
Route::get('/configureSite',function () {
	return view('siteConfigure');
});
Route::get('/embed.js',function(){
	 ob_start();
	 $url=$_SERVER['DOCUMENT_ROOT']."/embed.js";
    require($url);
    return ob_get_clean();
});
Route::get("/getComments/{name}/{identifier}",'User@fetchComments');
Route::get("/addComment/{thread_id}/{comment}",'User@addComment');