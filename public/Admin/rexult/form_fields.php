<?php
if(!isset($rexult)){
  redirect_to(urlFor('/admin/term/index.php'));
}
?>
<div class="form-group bg-warning">
  <input type="text" name="rexult[studId]" class="form-control" placeholder="Registration No" value="<?php echo $rexult->studId;?>">
</div>
<div class="form-group bg-warning">
  <select name="rexult[acadYr]" class="form-control">
    <option>Select A Session</option>
    <?php include(SHARED_PATH . '/getAcadYr.php'); ;?>
  </select>
</div>
<div class="form-group bg-warning">
  <select name="rexult[term]" class="form-control">
    <option>Select A Term</option>
    <?php include(SHARED_PATH . '/getTerm.php'); ;?>
  </select>
</div>
<div class="form-group bg-warning">
  <select name="rexult[resClass]" class="form-control">
    <option>Select A Class</option>
    <?php include(SHARED_PATH . '/getClax.php'); ;?>
  </select>
</div>
<div class="form-group bg-warning">
  <select name="rexult[arm]" class="form-control">
    <option>Select A Arm</option>
    <?php include(SHARED_PATH . '/getArm.php'); ;?>
  </select>
</div>
<div class="form-group bg-warning">
  <select name="rexult[term]" class="form-control">
    <option>Select A Subject</option>
      <?php include(SHARED_PATH . '/getSubjects.php'); ;?>
  </select>
</div>
<div>
  <?php echo $rexult->acadYr; ?>  
</div>

<div class="form-group bg-warning">
  
</div>
