<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/acadYr/index.php'));
}
$id = $_GET['id'];

$acadYr = AcadYr::find_by_id($id);

if($acadYr == false){
  redirect_to(urlFor('/admin/acadYr/index.php')); 
}

if(is_post_request()) {

  $result = $acadYr->delete();
  $session->message('Acad Yr deleted Successfully.');
  redirect_to(urlFor('/admin/acadYr/index.php'));
} else {
  //Display Form
}

?>

<?php $page_title = 'Delete AcadYr'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Delete Acad Yr</h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/acadYr/index.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/acadYr/new.php'); ?>"> Add New</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          <p>Are you sure you want to delete the listed Academic Year?</p>
          <p class="item"><?php echo h($acadYr->acadYrName); ?></p>

          <form action="<?php echo urlFor('/admin/acadYr/delete.php?id=' . h(u($acadYr->id))); ?>" method="post">
            <div><input class="btn btn-primary" type="submit" name="commit" value="Delete Academic Session" /></div>
          </form>
        </div>        
      </div>
    </div>      
  </div>
  </main>
    <?php include(SHARED_PATH .'/adminFooter.php');?>  