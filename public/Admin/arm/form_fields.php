<?php
if(!isset($arm)){
  redirect_to(urlFor('/admin/arm/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="arm[armName]" placeholder="Arm Name" value="<?php echo h($arm->armName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="arm[armDesc]" placeholder="Abbreviation" value="<?php echo h($arm->armDesc); ?>" />
</div>
