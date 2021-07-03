<?php 
      $terms = Term::find_all();
      foreach ($terms as $term) {?>
      
      <option value="<?php echo $term->id; ?>"><?php echo $term->termName; ?></option>

<?php }  ?>

 


 