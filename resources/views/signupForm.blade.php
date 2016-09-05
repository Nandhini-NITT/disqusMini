<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<h1>Registration</h1>
	@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

	{{$errors->first('emailid') }}
	{{$errors->first('username') }}
	{{$errors->first('password') }}
	{{$errors->first('phno') }}
	<form action='/signup' method='post'>
		<br>
		Username:<input type='text' name='username' required>
		<br>
		Password:<input type='password' name='password'>
		<br>
		Confirm Password:<input type='password' name='password_confirmation'>
		<br>
		EmailId:<input type='email' name='email_id'>
		<br>
		Mobile Number:<input type='number' name='phno'>
		<br>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type='submit'>Register</button>
	</form>
	</body>
</html>