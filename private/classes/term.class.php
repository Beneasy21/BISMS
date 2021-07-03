<?php

class Term extends DatabaseObject {

  static protected $table_name = "tblterm";
  static protected $db_columns = ['id', 'termName', 'termDesc'];

  public $id;
  public $termName;
  public $termDesc;
  

  public function __construct($args=[]) {
    $this->termName = $args['termName'] ?? '';
    $this->termDesc = $args['termDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->termName)) {
      $this->errors[] = "Term name cannot be blank.";
    } 

    if(is_blank($this->termDesc)) {
      $this->errors[] = "Term Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
