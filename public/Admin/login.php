 <?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($username)){
      $errors[] = "Username cannot be blank";
  }

  if(is_blank($password)){
    $errors[] = "Password cannot be blank";
    }

    //If no error exists
    if(empty($errors)){
      $login_failure_msg = "Login Failed";
        //Fetch admin
      $admin = Admin::find_by_username($username);
      if($admin != false && $admin->verify_password($password)){
              $session->login($admin);//log_in_admin($admin);
              //log_in_admin($admin);
              redirect_to(urlFor('/admin/index.php'));
          }else{
              //UserName or Password did Not match
              $errors[] = $login_failure_msg;
          }
        } 
    }
?>

<?php $page_title = 'Admin Log in'; ?>
<?php include(SHARED_PATH . '/resultHeader.php'); ?>

<div class="container mx-auto ">
  <div class="row text-center">
    <div class="col-md-8 mx-auto shadow m-5 p-5">
      <div class="row text-center">
        <div class="col-md-8 mx-auto">
          <img  src="<?php echo urlFor('/images/logo.png') ; ?>" style="height:150px; width:220px">
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6 mx-auto">
          <h2>Admin Login</h2>
	        <p>Please fill in your credentials to login.</p>
	        <?php echo display_errors($errors)		;?>
	          <form action="<?php echo urlFor('admin/login.php'); ?>" method="post">
	            <div class="form-group ">
	              <input type="text" name="username" class="form-control"  placeholder="Username">
	            </div>    
	            <div class="form-group">
	              <input type="password" name="password" class="form-control" placeholder="Password">
	            </div>
	            
                <div class="form-group">
	              <input type="submit" class="form-control btn btn-primary" value="Login">
	            </div>
	          </form>		
        </div>
      </div>
    </div>
  </div>
</div>