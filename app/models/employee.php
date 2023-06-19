<?php 
namespace  app\models;
use app\models\AbstractModel;
class Employee extends AbstractModel {

// private   $id;
public  $name; 
public  $salary; 

public $company; 

public  $address; 


public  $email; 

protected  static $table =  'employee';
protected  static $primaryKey =  'id';


public  static  $tableScheme = [
   'name' => self::DATA_TYPE_STRING,
   'salary' => self::DATA_TYPE_INT,
    'address' => self::DATA_TYPE_STRING ,
    'email' => self::DATA_TYPE_STRING,
    'company'  => self::DATA_TYPE_STRING
    ];

   


    // public function setName($name) {
    //   $this->name =  $name; 
    // }

    // public function __get($prop)
    // {
    //    $this->$prop;
    // }
}