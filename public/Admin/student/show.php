<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login(); ?>

<?php

$id = h($_GET['id']) ?? ''; // PHP > 7.0

$student = Student::find_by_id($id);

?>

<?php $page_title = 'Show Student: ' . h($student->studName); ?>
<?php include(SHARED_PATH . '/adminHeader.php'); ?>
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>View Student</h3>
          <h4><?php echo $student->studName; ?></h4>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/index.php'); ?>">&laquo; Back to List</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/new.php'); ?>">&laquo; Add New</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/edit.php?id='.h(u($student->id))); ?>">Edit</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/delete.php?id='.h(u($student->id))); ?>">Delete</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-left">
          <div>Reg No: <?php echo $student->studId;?></div>
          <div>Name: <?php echo $student->studName;?></div>
          <div>Sex: <?php echo $student->sex;?></div>
          <div>Class: <?php echo $student->currentClass;?></div>
          <div>Arm: <?php echo $student->arm;?></div>
          <div>House: <?php echo $student->house;?></div>
          <div>Session: <?php echo $student->acadYr;?></div>
          <div>Status: <?php echo $student->studStatus;?></div>
          <div>Date of Birth: <?php echo $student->studDOB;?></div>

        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>
