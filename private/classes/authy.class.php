<?php

class Authy extends DatabaseObject {

  static protected $table_name = "tblauth";
  static protected $db_columns = ['id', 'authId', 'username', 'hashed_password'];

  public $id;
  public $authId;
  public $username;
  public $password;
  protected $hashed_password;
  

  public function __construct($args=[]) {
    $this->authId = $args['authId'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
  }
  
  /*protected function validate() {
    $this->errors = [];

    if(is_blank($this->termName)) {
      $this->errors[] = "Term name cannot be blank.";
    } 

    if(is_blank($this->termDesc)) {
      $this->errors[] = "Term Abbreviation cannot be blank.";
    } 
    return $this->errors;
  }*/

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

}

?>
