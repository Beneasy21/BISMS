<?php

class Subjects extends DatabaseObject {

  static protected $table_name = "tblSubjects";
  static protected $db_columns = ['id', 'subName', 'subDesc'];

  public $id;
  public $subName;
  public $subDesc;
  

  public function __construct($args=[]) {
    $this->subName = $args['subName'] ?? '';
    $this->subDesc = $args['subDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->subName)) {
      $this->errors[] = "Subject name cannot be blank.";
    } 

    if(is_blank($this->subDesc)) {
      $this->errors[] = "Subject Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
