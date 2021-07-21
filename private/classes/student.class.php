<?php

class Student extends DatabaseObject {

  static protected $table_name = "students";
  static protected $db_columns = ['id', 'studId', 'studName', 'sex', 'currentClass', 'arm', 'house', 'studImage', 'acadYr', 'studStatus', 'studDOB','username','hashed_password'];

  public $id;
  public $studId;
  public $studName;
  public $sex;
  public $currentClass;
  public $arm;
  public $house;
  public $studImage;
  public $acadYr;
  public $studStatus;
  public $studDOB;
  public $username;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;
  
  public function __construct($args=[]) {

    $this->studId = $args['studId'] ?? '';
    $this->studName = $args['studName'] ?? '';
    $this->sex = $args['sex'] ?? '';
    $this->currentClass = $args['currentClass'] ?? '';
    $this->arm = $args['arm'] ?? '';
    $this->house = $args['house'] ?? '';
    $this->studImage = $args['studImage'] ?? '';
    $this->acadYr = $args['acadYr'] ?? '';
    $this->studStatus = $args['studStatus'] ?? '';
    $this->studDOB = $args['studDOB'] ?? '';
    $this->username = $args['studId'] ?? '';
    $this->password = $args['studId'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';

  }
    
  public function find_by_studId($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE studId='" . self::$database->escape_string($id) . "'";
    //echo $sql;
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  protected function update() {
    if($this->password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
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

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->studId)) {
      $this->errors[] = "Reg Number cannot be blank.";
    } 

    if(is_blank($this->studName)) {
      $this->errors[] = "Student cannot be blank.";
    } 

    if(is_blank($this->sex)) {
      $this->errors[] = "Sex cannot be blank.";
    } 

    if(is_blank($this->currentClass)) {
      $this->errors[] = "Class cannot be blank.";
    } 

    if(is_blank($this->arm)) {
      $this->errors[] = "Arm cannot be blank.";
    } 

    if(is_blank($this->house)) {
      $this->errors[] = "House cannot be blank.";
    } 

    if(is_blank($this->acadYr)) {
      $this->errors[] = "Academic Year cannot be blank.";
    } 

    if(is_blank($this->studStatus)) {
      $this->errors[] = "Student Status cannot be blank.";
    } 

    if(is_blank($this->studDOB)) {
      $this->errors[] = "Date of Birth cannot be blank.";
    } 

   /* if(is_blank($this->username)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
      $this->errors[] = "Username not allowed. Try another.";
    }

    if($this->password_required) {
      if(is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }*/

    return $this->errors;
  }

}

?>
