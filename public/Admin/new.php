<?php
  require_once('../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';
  
if(is_post_request()) {
  $args = $_POST['admin'];
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $new_id = $admin->id;
    $session->message('Admin created Successfully.');
    redirect_to(urlFor('/admin/show.php?id=' . $new_id));
  } else {
    //Show Errors$errors = $result;
  }

}
 else {

  // display the blank form
  $admin = new Admin;
}

?>

 <?php $page_title = 'Command:: Add Admin';
  include(SHARED_PATH . '/adminHeader.php');
?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Add Admin</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/showAll.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/new.php'); ?>" method="post">
            <?php include('form_fields.php');?>
            <p>
              Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
            </p>

            <div class="form-group">
              <button class="btn btn-primary">Create Admin</button>
              
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>

