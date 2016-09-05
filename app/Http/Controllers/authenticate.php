<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
class authenticate extends Controller
{
    
     public function doLogin(){
     	
    $rules = array(
    'username'    => 'required|max:20', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = \Validator::make(Input::all(), $rules);

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {

		 $name = Input::get('username');
   	 $password=Input::get('password');
   	 $givenCredentials=['user_name'=>$name,'user_pass'=>Hash::make($password)];
		 $count=User::where($givenCredentials)->count();
		 if($count==0)
		 {
		 	\Session::flash('message', 'Login Failed!Try again'); 
		 	return Redirect::to('login'); 

		 }
		 else 
		 {
		 	$loggedinUser=User::where($givenCredentials)->first();
	 		return Redirect::route('profile', array('user' =>$loggedinUser->id ));
		 }
	}
     }
   
}
