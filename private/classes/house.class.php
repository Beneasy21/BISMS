<?php

class House extends DatabaseObject {

  static protected $table_name = "tblhouse";
  static protected $db_columns = ['id', 'houseName', 'houseDesc'];

  public $id;
  public $houseName;
  public $houseDesc;
  

  public function __construct($args=[]) {
    $this->houseName = $args['houseName'] ?? '';
    $this->houseDesc = $args['houseDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->houseName)) {
      $this->errors[] = "House name cannot be blank.";
    } 

    if(is_blank($this->houseDesc)) {
      $this->errors[] = "House Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
