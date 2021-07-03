<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(urlFor('/admin/index.php'));
}
$id = $_GET['id'];

$admin = Admin::find_by_id($id);

if($admin == false){
  redirect_to(urlFor('/admin/index.php')); 
}

if(is_post_request()) {

  $result = $admin->delete();
  $session->message('Admin deleted.');
  redirect_to(urlFor('/admin/index.php'));
} else {
  //Display Form
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Delete Admin</h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/showAll.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/new.php'); ?>"> Add Admin</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          <p>Are you sure you want to delete this admin?</p>
          <p class="item"><?php echo h($admin->username); ?></p>

          <form action="<?php echo urlFor('/admin/delete.php?id=' . h(u($admin->id))); ?>" method="post">
            <div><input class="btn btn-primary" type="submit" name="commit" value="Delete Admin" /></div>
          </form>
        </div>        
      </div>

    </div>      
  </div>
  </main>
    <?php include(SHARED_PATH .'/adminFooter.php');?>        
  
    