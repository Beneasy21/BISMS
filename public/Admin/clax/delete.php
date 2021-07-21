<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/clax/index.php'));
}
$id = $_GET['id'];

$clax = Clax::find_by_id($id);

if($clax == false){
  redirect_to(urlFor('/admin/clax/index.php')); 
}

if(is_post_request()) {

  $result = $clax->delete();
  $session->message('Class deleted.');
  redirect_to(urlFor('/admin/clax/index.php'));
} else {
  //Display Form
}

?>

<?php $page_title = 'Delete Class'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Delete Class</h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/clax/index.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/clax/new.php'); ?>"> Add New</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          <p>Are you sure you want to delete the listed Class?</p>
          <p class="item"><?php echo h($clax->classsName); ?></p>

          <form action="<?php echo urlFor('/admin/clax/delete.php?id=' . h(u($clax->id))); ?>" method="post">
            <div><input class="btn btn-primary" type="submit" name="commit" value="Delete Class" /></div>
          </form>
        </div>        
      </div>

    </div>      
  </div>
  </main>
    <?php include(SHARED_PATH .'/adminFooter.php');?>  