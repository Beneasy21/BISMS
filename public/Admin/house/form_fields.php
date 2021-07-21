<?php
if(!isset($house)){
  redirect_to(urlFor('/admin/term/index.php'));
}
?>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="house[houseName]" placeholder="House Name" value="<?php echo h($house->houseName); ?>" />
</div>
<div class="form-group bg-warning">
  <input class="form-control" type="text" name="house[houseDesc]" placeholder="Abbreviation" value="<?php echo h($house->houseDesc); ?>" />
</div>
