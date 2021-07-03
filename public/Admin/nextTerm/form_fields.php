<?php
if(!isset($nextTerm)){
  //redirect_to(urlFor('/admin/term/index.php'));
}
?>
<div class="form-group bg-warning">
  <select class="form-control" name="nextTerm[acadYr]" id="">
    <option value=""> Select Academic Yr</option>
    <?php   
      include(SHARED_PATH. '/getAcadYr.php'); ?>
  </select>
</div>
<div class="form-group bg-warning">
  <select class="form-control" name="nextTerm[vTerm]" id="">
    <option value=""> Select A Term</option>
     <?php   
      include(SHARED_PATH. '/getTerm.php'); ?>

  </select>

</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="nextTerm[explanation]" value="<?php echo $nextTerm->explanation; ?>" placeholder="Next Term Resumes" />
</div>
