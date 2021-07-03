<?php

class NextTerm extends DatabaseObject {

  static protected $table_name = "nextterm";
  static protected $db_columns = ['id', 'acadYr','vTerm', 'explanation'];

  public $id;
  public $acadYr;
  public $vTerm;
  public $explanation;
  

  public function __construct($args=[]) {
    $this->acadYr = $args['acadYr'] ?? '';
    $this->vTerm = $args['vTerm'] ?? '';
    $this->explanation = $args['explanation'] ?? '';
  }
  
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->acadYr)) {
      $this->errors[] = "acadYr name cannot be blank.";
    } 

    if(is_blank($this->vTerm)) {
      $this->errors[] = "Term cannot be blank.";
    } 
    
    if(is_blank($this->explanation)) {
      $this->errors[] = "The date of Resumption cannot be blank.";
    } 
    return $this->errors;
  }

}

?>
