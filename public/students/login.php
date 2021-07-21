
<?php
    require_once('../../private/initialize.php');
    
    	$errors = [];
    	$username = '';
    	$password = ''; 

    if(is_post_request()){
    	$username = h($_POST['username']);
    	$password = h($_POST['password']);

    	if(is_blank($username)){
    		//if username is empty
    		$errors[] = "Username cannot be blank";
    	}

    	if(is_blank($password)){
    		//if password is empty
    		$errors[] = "password cannot be blank";
    	}
    	//If no errors
    	if(empty($errors)){
    		$loginFailed = "Login was unsuccessful";

    		$student = Student::find_by_username($username);

    		if($student != false && $student->verify_password($password)){
    			//password matches
					$session->Login($student);
					redirect_to(urlFor('students/index.php'));    				
    			} else {
    			//No record was recovered
    			$errors[]= $loginFailed;
    		}

    	}

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/myStyles.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/custom.css'); ?>" />

    <title>Student Login</title>
</head>
<body class="">
    <div class="container mx-auto">
    	<div class="text">
			<?php //include(SHARED_PATH . '/hyperlinkStudents.php') ;?>   		
	    	<main class="text-center">
	    		<div class="row ">
	    			<div class="col-3"></div>
	    		<div class="col-6 text-center shadow py-5">
	    			<div class="text-center">
    		<img  src="<?php echo urlFor('/images/logo.png') ; ?>" style="height:150px; width:220px">
	    	</div>
	    			<h2>Student's Login</h2>
	        		<p>Please fill in your credentials to login.</p>
	        		<?php echo display_errors($errors)		;?>
	        		<form action="<?php echo urlFor('students/login.php'); ?>" method="post">
	            		<div class="form-group ">
	                		<input type="text" name="username" class="form-control"  placeholder="Registration number">
	            		</div>    
	            		<div class="form-group">
	                		<input type="password" name="password" class="form-control" placeholder="Password">
	            		</div>
	            		<div class="form-group">
	                		<input type="submit" class="form-control btn btn-primary" value="Login">

	            		</div>
	                </form>		
	    		</div>
	    		<div class="col-23"></div>
	    		</div>		
	    	</main>		
    	</div>
    </div>  
</body>
</html>