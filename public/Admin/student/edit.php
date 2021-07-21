<?php

require_once('../../../private/initialize.php');

//require_login();

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/student/index.php'));
}

$id = $_GET['id'];
$student = Student::find_by_id($id);

if($student == false){
 redirect_to(urlFor('/admin/student/index.php')); 
}

if(is_post_request()) {

  $args = $_POST['student'];
 //var_dump($args);

  $student->merge_attributes($args);
  $result = $student->save();

  if($result === true) {
    $session->message('Admin updated.');
    redirect_to(urlFor('/admin/student/show.php?id=' . $id));
  } else {
    //$errors = $result;
  }
} else {
  //$admin = Admin::find_by_id($id);
}

?>

<?php $page_title = 'Edit Student'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH .'/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Edit Student</h3>
          <?php echo display_errors($student->errors); ?>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/student/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/student/edit.php?id='.h(u($id))); ?>" method="post">
            <?php include('form_fields.php');?>
            <p>
              Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
            </p>

            <div class="form-group">
              <button class="btn btn-primary">Update Student</button>
              
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>