<?php

class Arm extends DatabaseObject {

  static protected $table_name = "tblarm";
  static protected $db_columns = ['id', 'armName', 'armDesc'];

  public $id;
  public $armName;
  public $armDesc;
  

  public function __construct($args=[]) {
    $this->armName = $args['armName'] ?? '';
    $this->armDesc = $args['armDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->armName)) {
      $this->errors[] = "Arm name cannot be blank.";
    } 

    if(is_blank($this->armDesc)) {
      $this->errors[] = "Arm Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
