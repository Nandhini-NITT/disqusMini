
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
    <div id='comment'></div>
    <?php echo $errors->first('website_name'); ?>
 			<?php
 			  use App\User;
 			  $user=new User;
 			  $loginUser=User::where(['user_id'=>\Session::get('user')])->first();
 			  ?>
 		<h1>Welcome <?php echo $loginUser->user_name; ?></h1>
 		Register your website with us  
 		<form action=' ' method="POST">
 		Website name: <input type='text' name='website_name'>
 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
 		<button type='submit'>Submit</button>
 		</form>
	</body>
</html>