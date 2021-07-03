<?php require_once('../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$admin = Admin::find_by_id($id);

?>

<?php $page_title = 'Show Admin: ' . h($admin->full_name()); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Admin</h3>
          <h4><?php echo $admin->full_name(); ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/showAll.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/new.php'); ?>">&laquo; Add Admin</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/edit.php?id='.h(u($admin->id))); ?>">Edit</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Name: <?php echo $admin->full_name();?></div>
          <div>Username: <?php echo $admin->username;?></div>
          <div>Email: <?php echo $admin->email;?></div>              
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
