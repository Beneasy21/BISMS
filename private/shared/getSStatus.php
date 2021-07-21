<?php 
      $sstatuss = StudStatus::find_all();
      foreach ($sstatuss as $sstatus) {?>
      
      <option value="<?php echo $sstatus->id; ?>"><?php echo $sstatus->sName; ?></option>

<?php }  ?>