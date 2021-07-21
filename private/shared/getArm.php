<?php 
      $arms = Arm::find_all();
      foreach ($arms as $arm) {?>
      
      <option value="<?php echo $arm->id; ?>"><?php echo $arm->armName; ?></option>

<?php }  ?>