<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
     public function authenticate(){
		 $name = $request->input('username');
   	 $password=$request->input('password');
   	 return $name;
     }
   
}
?>