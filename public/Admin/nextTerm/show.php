<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$nextTerm = NextTerm::find_by_id($id);

?>

<?php $page_title = 'Resumption Date'; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Resumption Date</h3>
          <h4><?php //echo $nextTerm->tTermName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/new.php'); ?>">&laquo; Add Term</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/edit.php?id='.h(u($nextTerm->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/delete.php?id='.h(u($nextTerm->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Session: <?php 
              $acadYr = AcadYr::find_by_id($nextTerm->acadYr);
              echo $acadYr->acadYrName;?></div>
          <div>Term Name: <?php 
              $term = Term::find_by_id($nextTerm->vTerm);
              echo $term->termName;?></div>
          <div>Resumption Date: <?php echo $nextTerm->explanation;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
