
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <script type="text/javascript">
        	var website_name='nandhini';
        	var identifier='nandhu';
        </script>
        <script src='/embed.js' async=""></script> 
        
    </head>
    <body>
 			<?php
 			  use App\User;
 			  
 			  $loginUser=User::where(['user_id'=>\Session::get('user')])->first();
 			  var_dump($loginUser);
 			  ?>
 		<h1>Welcome <?php echo $loginUser->user_name; ?></h1>
 		Register your website with us  
 		<form action=' ' method="POST">
 		Website name: <input type='text' name='websitename'>
 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
 		<button type='submit'>Submit</button>
 		</form>
	</body>
</html>