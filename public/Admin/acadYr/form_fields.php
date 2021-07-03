<?php
if(!isset($acadYr)){
  redirect_to(urlFor('/admin/term/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="acadYr[acadYrName]" placeholder="Session Name" value="<?php echo h($acadYr->acadYrName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="acadYr[acadYrDesc]" placeholder="Abbreviation" value="<?php echo h($acadYr->acadYrDesc); ?>" />
</div>
