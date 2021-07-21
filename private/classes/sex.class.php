<?php

class Sex extends DatabaseObject {

  static protected $table_name = "tblsex";
  static protected $db_columns = ['id', 'sexName', 'sexDesc'];

  public $id;
  public $sexName;
  public $sexDesc;
  

  public function __construct($args=[]) {
    $this->sexName = $args['sexName'] ?? '';
    $this->sexDesc = $args['sexDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->sexName)) {
      $this->errors[] = "Sex name cannot be blank.";
    } 

    if(is_blank($this->sexDesc)) {
      $this->errors[] = "Sex Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
