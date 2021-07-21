<?php

class Comment extends DatabaseObject {

  static protected $table_name = "comments";
  static protected $db_columns = ['id', 'studId', 'acadYr',  'term', 'classTeacher',  'houseParent', 'commandant'];

  public $id;
  public $studId;
  public $acadYr;
  public $term;
  public $classTeacher;
  public $houseParent;
  public $commandant;
  

  public function __construct($args=[]) {
    
    $this->studId = $args['studId'] ?? '';
    $this->acadYr = $args['acadYr'] ?? '';
    $this->term = $args['term'] ?? '';
    $this->classTeacher = $args['classTeacher'] ?? '';
    $this->houseParent = $args['houseParent'] ?? '';
    $this->commandant = $args['commandant'] ?? '';
  }
  
  public function termlyComment($RegNo, $Session, $Term){
    $sql = "select classTeacher,  houseParent, commandant FROM " . static::$table_name;
    $sql .= " WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND term = '".$Term."'";
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

    if(is_blank($this->studId)) {
      $this->errors[] = "Reg No cannot be blank.";
    } 
    if(is_blank($this->acadYr)) {
      $this->errors[] = "Session cannot be blank.";
    } 
    if(is_blank($this->term)) {
      $this->errors[] = "Term cannot be blank.";
    } 
    
    return $this->errors;
  }

}

?>
