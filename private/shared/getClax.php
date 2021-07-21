<?php 
      $claxs = Clax::find_all();
      foreach ($claxs as $clax) {?>
      
      <option value="<?php echo $clax->id; ?>"><?php echo $clax->classsName; ?></option>

<?php }  ?>