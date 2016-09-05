<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
class newUser extends Controller
{
    
     public function signup(){
     $rules=['username'=>'Required|min:3|max:20|alpha',
     			'password'=>'required|alpha_num|min:3|max:10|Confirmed',
     			'password_confirmation'=>'required|alpha_num|min:3|max:10',
     			'email_id'=>'required|Email|Unique:users',
     			'phno'=>'required|min:8|max:10|Unique:users'];
     $validator=\Validator::make(Input::all(),$rules);
     if($validator->fails())
     	{
     		return Redirect::to('signup')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); 
      }
     else {
     		$user=new User;
     		$user->user_name=Input::get('username');
     		$user->user_pass=Hash::make(Input::get('password'));
     		$user->email_id=Input::get('email_id');
     		$user->phno=Input::get('phno');
	     	if($user->save())
	     		return Redirect::route('profile', array('user' =>$user->id ));
	     	else {
	     		\Session::flash('message', 'Signup Failed!Try again'); 
		 	return Redirect::to('signup'); 
     		
     }
}
}
}     