<?php

require_once('../../../private/initialize.php');

//require_login();

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/subjects/index.php'));
}

$id = $_GET['id'];
$subjects = Subjects::find_by_id($id);

if($subjects == false){
 redirect_to(urlFor('/admin/subjects/index.php')); 
}

if(is_post_request()) {

  $args = $_POST['subjects'];
  $subjects->merge_attributes($args);
  $result = $subjects->save();

  if($result === true) {
    $session->message('Subject updated Successfully.');
    redirect_to(urlFor('/admin/subjects/show.php?id=' . $id));
  } else {
    
  }
} else {
  
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH .'/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Edit Subject</h3>
          <?php echo display_errors($subjects->errors); ?>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/subjects/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/subjects/edit.php?id='.h(u($id))); ?>" method="post">
            <?php include('form_fields.php');?>
            <div class="form-group">
              <button class="btn btn-primary">Update Subject</button>
            </div>
          </form>            
        </div>        
      </div>
    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>