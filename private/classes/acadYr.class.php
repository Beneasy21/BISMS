<?php

class AcadYr extends DatabaseObject {

  static protected $table_name = "tblacadyr";
  static protected $db_columns = ['id', 'acadYrName', 'acadYrDesc'];

  public $id;
  public $acadYrName;
  public $acadYrDesc;
  

  public function __construct($args=[]) {
    $this->acadYrName = $args['acadYrName'] ?? '';
    $this->acadYrDesc = $args['acadYrDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->acadYrName)) {
      $this->errors[] = "Academic Session name cannot be blank.";
    } 

    if(is_blank($this->acadYrDesc)) {
      $this->errors[] = "Academic Session Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
