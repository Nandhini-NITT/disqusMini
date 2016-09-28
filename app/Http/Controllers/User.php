<?php
namespace App\Http\Controllers;
use DateTime;
use App\user_website;
use App\User;
use App\comment;
use App\website_thread;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
class User extends Controller
{
    public function registerWebsite(){
     $rules=['website_name'=>'Required|min:5|Unique:user_websites'];
     $validator=\Validator::make(Input::all(),$rules);
     if($validator->fails())
     {
     return Redirect::back()
        ->withErrors($validator);
     }
     else {
     $user=new \App\user_website;
     $user->user_id=\Session::get('user');
   $user->website_name=Input::get('website_name');
     	if($user->save())
     	{
	     	return Redirect::to('configureSite');
     	}
  }
  }
  public function fetchComments($id,$thread)
  {
  			$userwebsite=new \App\user_website;
  			header("Access-Control-Allow-Origin: *");

if($userwebsite->where('website_name','=',$id)->count()==0)
  			echo "Please register your website with us";
  			
  			else
  			{
  				$thread_id=null;
				$website_id=$userwebsite->where('website_name','=',$id)->first()->website_id;				
  			$threads=new \App\website_thread;
  			if($threads->where('website_id','=',$website_id)->where('identifier','=',$thread)->count()==0)
  				{
  					$newthread=new \App\website_thread;
  					$newthread->website_id=$website_id;
  					$newthread->identifier=$thread;
  					$newthread->save();
  					$thread_id=$newthread->thread_id;
  					
  			}
  			else {
  			$thread_id=\App\website_thread::where('identifier','=',$thread)->where('website_id','=',$website_id)->first()->thread_id;
  			$comments=new \App\comment;
  			$result=$comments->where('thread_id','=',$thread_id)->get();
  			if($result->count()!=0)
  			foreach($result as $comment)
  				{
  					if($comment->givenby!=0)
  					echo "<div id='list'>".\App\User::find($comment->givenby)->user_name."&nbsp at<br>".$comment->timestamp."&nbsp &nbsp".$comment->comment."</div>";
}  	}
  	\Session::put('thread',$thread_id);
  	if(!\Session::has('user'))
  		echo "<button id='loginButton' onClick='login();'>Login</button><br>";
  	echo "<input type='text' id='usercomment'><button type='submit' onClick='addComment(".$thread_id.")';return false;' >Submit</button>";
}
}
	public function addComment($thread_id,$comment)
	{
		
		$newComment=new \App\comment;
		$newComment->thread_id=$thread_id;
		$newComment->parent_id=-1;
		header("Access-Control-Allow-Origin: *");
		if(\Session::has('user'))
			{
				$newComment->givenby=\Session::get('user');
				$dt = new DateTime;
	 	$newComment->timestamp=$dt->format('m-d-y H:i:s');
	 	$newComment->comment=$comment;
		$newComment->save();
		echo "Your comment was posted";
	}
		else 
			echo "Please login";
	}
	public function dologin()
	{
			header("Access-Control-Allow-Origin: *");
    $rules = array(
    'username'    => 'required|max:20', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);

	// run the validation rules on the inputs from the form
	$validator = \Validator::make(Input::all(), $rules);
	 if($validator->fails())
	 	{
	 return json_encode($validator->getMessageBag());
	 	
	 	}
	 else {
	 $name = Input::get('username');
   	 $password=Input::get('password');
   	 $givenCredentials=['user_name'=>$name];
		 $count=User::where($givenCredentials)->count();
		 if($count==0)
		 {
		 	return "Username does not exist";

		 }
		 else 
		 {
		 	$loginUser=User::where($givenCredentials)->first();
		 	if(Hash::check($password,$loginUser->user_pass))
		 		{
					\Session::put('user',$name);
					return "Logged in";
	 			}
	 		else 
	 			return "Invalid login credentials";
		 }
	}
}
function showProfile()
{
	if(\Session::has('user'))
	return view('profile');
	else 
	return Redirect::to('/login');
}
}
  
  