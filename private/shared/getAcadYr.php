<?php   
      //$acadYrs = AcadYr::find_all();
      foreach (AcadYr::find_all() as $acadYr) {?>
        
     <option value="<?php echo $acadYr->id;?>"><?php echo $acadYr->acadYrName?></option>
<?php } ?>