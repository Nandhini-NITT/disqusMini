<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
   <?php
   if(\Session::has('user'))
   Redirect::to('/profile');
   ?>
    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
  {{ $errors->first('username') }}
    {{ $errors->first('password') }}
    	<form action='/login' method='post'>
    		User Name: <input type='text' name='username'>
    		Password: <input type='password' name='password'>
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		<button type='submit'>Submit</button>
    	</form>
    	<a href='signup'>Not registered yet? Signup </a>
    </body>
        
