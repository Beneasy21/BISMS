<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/arm/index.php'));
}
$id = $_GET['id'];

$arm = Arm::find_by_id($id);

if($arm == false){
  redirect_to(urlFor('/admin/arm/index.php')); 
}

if(is_post_request()) {

  $result = $arm->delete();
  $session->message('Arm deleted.');
  redirect_to(urlFor('/admin/arm/index.php'));
} else {
  //Display Form
}

?>

<?php $page_title = 'Delete Arm'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Delete Arm</h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/arm/index.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/arm/new.php'); ?>"> Add New</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          <p>Are you sure you want to delete the listed Arm?</p>
          <p class="item"><?php echo h($arm->armName); ?></p>

          <form action="<?php echo urlFor('/admin/arm/delete.php?id=' . h(u($arm->id))); ?>" method="post">
            <div><input class="btn btn-primary" type="submit" name="commit" value="Delete Arm" /></div>
          </form>
        </div>        
      </div>

    </div>      
  </div>
  </main>
    <?php include(SHARED_PATH .'/adminFooter.php');?>  