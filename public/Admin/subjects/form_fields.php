<?php
if(!isset($subjects)){
  redirect_to(urlFor('/admin/subjects/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="subjects[subName]" placeholder="Subject Name" value="<?php echo h($subjects->subName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="subjects[subDesc]" placeholder="Abbreviation" value="<?php echo h($subjects->subDesc); ?>" />
</div>
