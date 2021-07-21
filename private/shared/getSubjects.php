<?php 
      $subjects = Subjects::find_all();
      foreach ($subjects as $subj) {?>
      
      <option value="<?php echo $subj->id; ?>"><?php echo $subj->subName; ?></option>

<?php }  ?>