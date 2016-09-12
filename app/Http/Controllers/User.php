<?php
namespace App\Http\Controllers;
use DateTime;
use App\user_website;
use App\comment;
use App\website_thread;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
  					$newthread->identifier=str_random(30);
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
 			  else 
 			  		echo "<div id='list'>Anonymous"."&nbsp at<br>".$comment->timestamp."&nbsp &nbsp".$comment->comment."</div>";
}  	}
  	\Session::put('thread',$thread_id);
  	echo "<form><input type='text' id='usercomment'><button type='submit' onClick='addComment(".$thread_id.")';return false;' >Submit</button></form>";
}
}
	public function addComment($thread_id,$comment)
	{
		
		$newComment=new \App\comment;
		$newComment->thread_id=$thread_id;
		$newComment->parent_id=-1;
		if(\Session::has('user'))
		$newComment->givenby=\Session::get('user');
		else 
		$newComment->givenby=0;
		$dt = new DateTime;
	 	$newComment->timestamp=$dt->format('m-d-y H:i:s');
	 	$newComment->comment=$comment;
		$newComment->save();
	}
  }