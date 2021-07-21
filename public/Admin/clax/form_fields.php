<?php
if(!isset($clax)){
  redirect_to(urlFor('/admin/clax/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="clax[classsName]" placeholder="Class Name" value="<?php echo h($clax->classsName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="clax[classsDesc]" placeholder="Abbreviation" value="<?php echo h($clax->classsDesc); ?>" />
</div>
