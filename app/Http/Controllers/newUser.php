<?php

namespace App\Http\Controllers;
use App\User;
use App\user_website;
use App\website_thread;
use App\comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
class newUser extends Controller
{
	public function showsignup()
	{
		if(\Session::has('user'))
 	    return Redirect::to('/profile');
     else 
     		return view('signupForm');
	}
    
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
	     	{
	     		\Session::put('user',$user->user_id);
	     		return Redirect::to('/profile');
	     	}
	     	else {
	     		\Session::flash('message', 'Signup Failed!Try again'); 
		 	return Redirect::to('signup'); 
     		
     }
  }
}

	public function registerWebsite(){
     $rules=['websitename'=>'Required|min:5'];
     $validator=\Validator::make(Input::all(),$rules);
     if($validator->fails())
     {
     return Redirect::to('profile')
        ->withErrors($validator);
     }
     else {
     $userwebsite=new User_website;
     $userwebsite->user_id=\Session::get('user');
   $userwebsite->website_name=Input::get('websitename');
     	if($userwebsite->save())
     	{
	     	return Redirect::to('configureSite');
     	}
  }}
  public function showWebsites()
  {
  	$givenCredentials=['user_id'=>\Session::get('user')];
	$userwebsites=user_website::where($givenCredentials)->get();
	foreach($userwebsites as $website)
	echo '<div id="website'.$website->website_id.'"><a href="#" onClick=findthreads("'.$website->website_id.'");return false;>'.$website->website_name.'</a><div id="thread'.$website->website_id.'"></div></div><br>';
  }
  public function showthreads($website_id)
  {
  			
  		$givenCredentials=['website_id'=>$website_id];
  		$websitethreads=website_thread::where($givenCredentials)->get();
  		foreach($websitethreads as $thread)
  			{echo '<a href="#" onClick=showComments("'.$thread->thread_id.'");return false;>'.$thread->identifier."</a><br>";
  			echo "<div id='comment".$thread->thread_id."'></div></div>";
  		}
  }	
  public function showComments($thread_id)
  {
  $givenCredentials=['thread_id'=>$thread_id];
  $comments=comment::where($givenCredentials)->get();
  foreach($comments as $comment)
  	echo "<div id='list'>".\App\User::find($comment->givenby)->user_name."&nbsp at<br>".$comment->timestamp."&nbsp &nbsp".$comment->comment."</div>";
  }
  
}     