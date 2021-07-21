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

  public function nextTermBegins($Session, $Term){
    $sql = "select explanation FROM " . static::$table_name;
    $sql .= " WHERE acadYr = '".$Session."' AND vterm = '".$Term."'";
    //echo $sql;
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
    
  }

  public function newSessionBegins($Session){
    $sql = "select explanation FROM " . static::$table_name;
    $sql .= " WHERE acadYr = '".$Session."' AND vterm = '3'";
    //echo $sql;
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
    
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
