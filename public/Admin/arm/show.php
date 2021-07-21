<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$arm = Arm::find_by_id($id);

?>

<?php $page_title = 'Show Term: ' . h($arm->armName); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Arm</h3>
          <h4><?php echo $arm->armName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/edit.php?id='.h(u($arm->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/delete.php?id='.h(u($arm->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Arm Name: <?php echo $arm->armName;?></div>
          <div>Abbreviation: <?php echo $arm->armDesc;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
