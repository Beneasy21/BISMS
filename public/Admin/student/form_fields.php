<?php
if(!isset($student)){
  redirect_to(urlFor('/admin/student/index.php'));
}
?>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="text" name="student[studId]" placeholder="Reg No" value="<?php echo h($student->studId); ?>" />
  </div>
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="text" name="student[studName]" placeholder="Student Name" value="<?php echo h($student->studName); ?>" />
  </div>  
</div>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <select name="student[sex]" class="form-control">
      <option value="">Select Sex</option>  
      <?php include(SHARED_PATH . '/getSex.php') ?>
    </select>
  </div>
  <div class="col-md-6 form-group bg-warning">
    <select name="student[currentClass]" class="form-control">
      <option value="">Select Class</option>  
      <?php include(SHARED_PATH . '/getClax.php') ?>
    </select>
  </div>  
</div>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <select name="student[arm]" class="form-control">
      <option value="">Select Arm</option>  
      <?php include(SHARED_PATH . '/getArm.php') ?>
    </select>
  </div>
  <div class="col-md-6 form-group bg-warning">
    <select name="student[house]" class="form-control">
      <option value="">Select House</option>  
      <?php include(SHARED_PATH . '/getHouse.php') ?>
    </select>
  </div>  
</div>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <select name="student[acadYr]" class="form-control">
      <option value="">Select Session</option>  
      <?php include(SHARED_PATH . '/getAcadYr.php') ?>
    </select>
  </div>
  <div class="col-md-6 form-group bg-warning">
    <select name="student[studStatus]" class="form-control">
      <option value="">Select Student status</option>  
      <?php include(SHARED_PATH . '/getSStatus.php') ?>
    </select>
  </div>  
</div>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="text" name="student[studDOB]" placeholder="YYYY-MM-DD" value="<?php echo h($student->studDOB); ?>" />
  </div>
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="text" name="student[username]" placeholder="Username" value="" />
  </div>  
</div>
<div class="row">
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="password" name="student[password]" placeholder="password" value="" />
  </div>  
  <div class="col-md-6 form-group bg-warning">
    <input class="form-control" type="password" name="student[confirm_password]" placeholder="Re Enter password" value="" />
  </div>
</div>
