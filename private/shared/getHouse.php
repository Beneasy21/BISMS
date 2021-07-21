<?php 
      $houses = House::find_all();
      foreach ($houses as $house) {?>
      
      <option value="<?php echo $house->id; ?>"><?php echo $house->houseName; ?></option>

<?php }  ?>