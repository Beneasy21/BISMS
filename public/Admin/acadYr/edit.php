<?php

require_once('../../../private/initialize.php');

//require_login();

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/acadYr/index.php'));
}

$id = $_GET['id'];
$acadYr = AcadYr::find_by_id($id);

if($acadYr == false){
 redirect_to(urlFor('/admin/acadYr/index.php')); 
}

if(is_post_request()) {

  $args = $_POST['acadYr'];
  $acadYr->merge_attributes($args);
  $result = $acadYr->save();

  if($result === true) {
    $session->message('Session updated Successfully.');
    redirect_to(urlFor('/admin/acadYr/show.php?id=' . $id));
  } else {
    
  }
} else {
  
}

?>

<?php $page_title = 'Edit AcadYr'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH .'/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Edit AcadYr</h3>
          <?php echo display_errors($acadYr->errors); ?>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/acadYr/edit.php?id='.h(u($id))); ?>" method="post">
            <?php include('form_fields.php');?>
            <div class="form-group">
              <button class="btn btn-primary">Update Academic Session</button>
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>