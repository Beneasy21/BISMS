<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$acadYr = AcadYr::find_by_id($id);
var_dump($acadYr);

?>

<?php $page_title = 'Show AcadYr: ' . h($acadYr->acadYrName); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View AcadYr</h3>
          <h4><?php echo $acadYr->acadYrName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/edit.php?id='.h(u($acadYr->id))); ?>">Edit</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Session Name: <?php echo $acadYr->acadYrName;?></div>
          <div>Abbreviation: <?php echo $acadYr->acadYrDesc;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
