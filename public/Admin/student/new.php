<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';
  
if(is_post_request()) {
  $args = $_POST['student'];
  $student = new Student($args);
  $result = $student->save();

  if($result === true) {
    $new_id = $student->id;
    $session->message('Student created Successfully.');
    
    redirect_to(urlFor('/admin/student/show.php?id=' . $new_id));
  } else {
    //Show Errors$errors = $result;
  }

}
 else {

  // display the blank form
  $student = new Student;
}

?>

 <?php $page_title = 'Command:: Add Student';
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
          <h3>Add Student</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-9 text-center">
          <form action="<?php echo urlFor('/admin/student/new.php'); ?>" method="post">
            <?php include('form_fields.php');?>
            
            <div class="form-group">
              <button class="btn btn-primary">Create student</button>
              
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>

