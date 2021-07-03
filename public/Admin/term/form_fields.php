<?php
if(!isset($term)){
  redirect_to(urlFor('/admin/term/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="term[termName]" placeholder="Term Name" value="<?php echo h($term->termName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="term[termDesc]" placeholder="Abbreviation" value="<?php echo h($term->termDesc); ?>" />
</div>
