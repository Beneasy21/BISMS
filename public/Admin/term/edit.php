<?php

require_once('../../../private/initialize.php');

//require_login();

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/term/index.php'));
}

$id = $_GET['id'];
$term = Term::find_by_id($id);

if($term == false){
 redirect_to(urlFor('/admin/term/index.php')); 
}

if(is_post_request()) {

  $args = $_POST['term'];
  $term->merge_attributes($args);
  $result = $term->save();

  if($result === true) {
    $session->message('Term updated Successfully.');
    redirect_to(urlFor('/admin/term/show.php?id=' . $id));
  } else {
    
  }
} else {
  
}

?>

<?php $page_title = 'Edit Term'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH .'/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>Edit Term</h3>
          <?php echo display_errors($term->errors); ?>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/term/index.php'); ?>">&laquo; Back to List</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <form action="<?php echo urlFor('/admin/term/edit.php?id='.h(u($id))); ?>" method="post">
            <?php include('form_fields.php');?>
            <div class="form-group">
              <button class="btn btn-primary">Update Term</button>
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>