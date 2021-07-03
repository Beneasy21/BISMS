<?php

require_once('../../../private/initialize.php');

//require_login();

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/term/index.php'));
}

$id = $_GET['id'];
$nextTerm = NextTerm::find_by_id($id);

if($nextTerm == false){
 redirect_to(urlFor('/admin/nextTerm/index.php')); 
}

if(is_post_request()) {

  $args = $_POST['nextTerm'];
  $nextTerm->merge_attributes($args);
  $result = $nextTerm->save();

  if($result === true) {
    $session->message('Resumption Date updated Successfully.');
    redirect_to(urlFor('/admin/nextTerm/show.php?id=' . $id));
  } else {
    
  }
} else {
  
}

?>

<?php $page_title = 'Edit Resumption'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH .'/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Edit Resumption</h3>
          <?php echo display_errors($nextTerm->errors); ?>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/nextTerm/edit.php?id='.h(u($id))); ?>" method="post">
            <?php include('form_fields.php');?>
            <div class="form-group">
              <button class="btn btn-primary">Update Resumption Date</button>
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>