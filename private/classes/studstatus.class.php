<?php

class StudStatus extends DatabaseObject {

  static protected $table_name = "tblsstatus";
  static protected $db_columns = ['id', 'sName', 'sDesc'];

  public $id;
  public $sName;
  public $sDesc;
  

  public function __construct($args=[]) {
    $this->sName = $args['sName'] ?? '';
    $this->sDesc = $args['sDesc'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->sName)) {
      $this->errors[] = "Status name cannot be blank.";
    } 

    if(is_blank($this->sDesc)) {
      $this->errors[] = "Status Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
