<?php
namespace App\Http\Controllers;
use App\user_websites;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class User extends Controller
{
    public function registerWebsite(){
     $rules=['websitename'=>'Required|min:5'];
     $validator=\Validator::make(Input::all(),$rules);
     if($validator->fails())
     {
     return Redirect::to('profile')
        ->withErrors($validator);
     }
     else {
     $userwebsite=new \user_websites;
     $user->user_id=\Session::get('user');
   $user->website_name=Input::get('websitename');
     	if($user->save())
     	{
	     	return Redirect::to('configureSite');
     	}
  }
  }
  public function fetchComments()
  {
  	echo 'went to controller';
  	}
}
  