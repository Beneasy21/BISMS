<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$rexult = Rexult::find_by_id($id);
$acadYr = AcadYr::find_by_id($rexult->acadYr);
$term = Term::find_by_id($rexult->term);
$clax = Clax::find_by_id($rexult->resClass);
$arm = Arm::find_by_id($rexult->arm);
$subjects = Subjects::find_by_id($rexult->subjects);


?>

<?php $page_title = 'Show Result: '; ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Result</h3>
          <h4><?php echo $rexult->subjects; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/edit.php?id='.h(u($term->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/delete.php?id='.h(u($rexult->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Reg No: <?php echo $rexult->studId;?></div>
          <div>Session: <?php echo $acadYr->acadYrName;?></div>
          <div>Term: <?php echo $term->termName;?></div>
          <div>Class: <?php echo $clax->classsName;?></div>
          <div>Arm: <?php echo $arm->armName;?></div>
          <div>Subject: <?php echo $subjects->subName;?></div>
          <div>CA 1: <?php echo $rexult->ca1;?></div>
          <div>CA 2: <?php echo $rexult->ca2;?></div>
          <div>Exam: <?php echo $rexult->exam;?></div>
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
