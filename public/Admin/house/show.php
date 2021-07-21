<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$house = House::find_by_id($id);

?>

<?php $page_title = 'Show House: ' . h($house->houseName); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View House</h3>
          <h4><?php echo $house->houseName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/edit.php?id='.h(u($house->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/delete.php?id='.h(u($house->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>House Name: <?php echo $house->houseName;?></div>
          <div>Abbreviation: <?php echo $house->houseDesc;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
