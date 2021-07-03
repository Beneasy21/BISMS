<?php   
      $acadYrs = AcadYr::find_all();
      foreach ($acadYrs as $acadYr) {?>
        
     <option value="<?php echo $acadYr->id;?>"><?php echo $acadYr->acadYrName?></option>
<?php } ?>