<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$term = Term::find_by_id($id);

?>

<?php $page_title = 'Show Term: ' . h($term->termName); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Term</h3>
          <h4><?php echo $term->termName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/edit.php?id='.h(u($term->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/delete.php?id='.h(u($term->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Term Name: <?php echo $term->termName;?></div>
          <div>Abbreviation: <?php echo $term->termDesc;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
