<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
class authenticate extends Controller
{
	public function showLogin(){
		if(\Session::has('user'))
			{
 				return Redirect::to('/profile');
 			}
 		else
		return view('loginForm');
		}
    
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
   	 $givenCredentials=['user_name'=>$name];
		 $count=User::where($givenCredentials)->count();
		 if($count==0)
		 {
		 	\Session::flash('message', 'Username doesnt exist'+\Session::get('user')); 
		 	return Redirect::to('login'); 

		 }
		 else 
		 {
		 	$loginUser=User::where($givenCredentials)->first();
		 	if(Hash::check($password,$loginUser->user_pass))
		 		{
					\Session::put('user',$loginUser->user_id)	;		
 				return Redirect::to('/profile');
	 			}
		 }
	}
     }
   
}
