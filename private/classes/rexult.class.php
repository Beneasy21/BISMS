<?php

class Rexult extends DatabaseObject {

  static protected $table_name = "rexult";
  static protected $db_columns = ['id', 'studId', 'acadYr', 'term', 'resClass', 'arm', 'subjects', 'ca1', 'ca2', 'exam'];

  public $id;
  public $studId;
  public $acadYr;
  public $term;
  public $resClass;
  public $arm;
  public $subjects;
  public $ca1;
  public $ca2;
  public $exam;
  public $examTotal;
  public $chm;
  public $cam;
  public $clm;
  public $termTotal;
  public $termAvg;
  public $First;
  public $Second;
  public $Third;
  public $lowest;
  public $Avgr;
  public $highest;
  public $annualTotal;
  public $annualAvg;

  public function __construct($args=[]) {
    $this->studId = $args['studId'] ?? '';
    $this->acadYr = $args['acadYr'] ?? '';
    $this->term = $args['term'] ?? '';
    $this->resClass = $args['resClass'] ?? '';
    $this->arm = $args['arm'] ?? '';
    $this->subjects = $args['subjects'] ?? '';
    $this->ca1 = $args['ca1'] ?? '';
    $this->ca2 = $args['ca2'] ?? '';
    $this->exam = $args['exam'] ?? '';
  }

  public function fetch_individual_result($RegNo,$Session, $Term){
    $sql = "SELECT r.subjects,r.ca1,r.ca2,r.exam,r.examTotal,
    MAX(r2.`examTotal`) AS chm, 
    ROUND(AVG(r2.`examTotal`)) AS cam, 
    MIN(CASE WHEN r2.`examTotal` != 0 THEN r2.`examTotal` END) AS clm 
    FROM " . static::$table_name. " r";
    $sql .= " LEFT OUTER JOIN rexult r2 ON r.subjects = r2.subjects 
        WHERE r.studId = '".$RegNo."' AND r.acadYr = '".$Session."' AND r2.acadYr = '".$Session."' AND r.term = '".$Term."' 
        GROUP BY r.`subjects`
        ORDER BY r.resClass,
        CASE r.`subjects`
         WHEN '19' THEN 1
         WHEN '35' THEN 2
         WHEN '13' THEN 3
         ELSE 4
         END, r.subjects ASC";

    //echo $sql;
    return static::find_by_sql($sql);
  }

 public function fetch_termly_avg_n_sum($RegNo,$Session, $Term){
    $sql = "select SUM(examTotal) AS termTotal, AVG(examTotal) AS termAvg FROM " . static::$table_name. " r";
    $sql .= " WHERE studId = '".$RegNo."' AND acadYr = '".$Session."' AND 
  term = '".$Term."'";
    //echo $sql;
    $obj_array =  static::find_by_sql($sql); 
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  
public function fetch_annual_result($RegNo, $Session){
  $sql = "SELECT r1.`subjects`,
      MAX(CASE WHEN r1.`term` = '1' THEN r1.`examTotal` END) 'First',
      MAX(CASE WHEN r1.`term` = '2' THEN r1.`examTotal` END) 'Second',
      MAX(CASE WHEN r1.`term` = '3' THEN r1.`examTotal` END) 'Third',
      MIN(CASE WHEN r2.`examTotal` != 0 THEN r2.`examTotal` END) as lowest,
      MAX(r2.`examTotal`) as highest,
      AVG(r2.`examTotal`) as Avgr,
      MIN(r2.`examTotal`) as lowest
      FROM " . static::$table_name. " r1";
  $sql .= " LEFT OUTER JOIN `rexult` r2 ON r2.`subjects` = r1.`subjects`
      WHERE r1.`studId` = '".$RegNo."' AND r2.`resClass` = r1.`resClass` AND r1.acadYr = '".$Session."'
      GROUP BY r1.`subjects`
      ORDER BY r1.`subjects` ASC";
      //echo $sql;
       return static::find_by_sql($sql);
}

public function fetch_annual_avg_n_sum($RegNo,$Session){
    $sql = "select SUM(examTotal) AS annualTotal, AVG(examTotal) AS annualAvg FROM " . static::$table_name. " r";
    $sql .= " WHERE studId = '".$RegNo."' AND acadYr = '".$Session."'";
    //echo $sql;
    $obj_array =  static::find_by_sql($sql); 
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

    if(is_blank($this->acadYr)) {
      $this->errors[] = "Academic Year cannot be blank.";
    } 

    if(is_blank($this->term)) {
      $this->errors[] = "Term cannot be blank.";
    } 

    if(is_blank($this->resClass)) {
      $this->errors[] = "Class cannot be blank.";
    } 

    if(is_blank($this->arm)) {
      $this->errors[] = "Arm cannot be blank.";
    } 

    if(is_blank($this->subjects)) {
      $this->errors[] = "Subjects cannot be blank.";
    } 

    if(is_blank($this->ca1)) {
      $this->errors[] = "CA 1 cannot be blank.";
    } 

    if(is_blank($this->ca2)) {
      $this->errors[] = "CA 2 cannot be blank.";
    } 

    if(is_blank($this->exam)) {
      $this->errors[] = "Exam score cannot be blank.";
    } 

    return $this->errors;
  }

}

?>
