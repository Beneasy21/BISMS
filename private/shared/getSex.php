<?php 
      $sexs = Sex::find_all();
      foreach ($sexs as $sex) {?>
      
      <option value="<?php echo $sex->id; ?>"><?php echo $sex->sexName; ?></option>

<?php }  ?>