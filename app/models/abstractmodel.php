<?php
namespace app\models;

use app\lib\database\Database;



class AbstractModel extends Database  {


    const DATA_TYPE_BOOLEAN =  \PDO::PARAM_BOOL;
    const  DATA_TYPE_STRING =  \PDO::PARAM_STR;
    const DATA_TYPE_INT  = \PDO::PARAM_INT; 
    const DATA_TYPE_DECIMAL = 4;
    const DATA_TYPE_DATE = 5;

    const VALIDATE_DATE_STRING = '/^[1-2][0-9][0-9][0-9]-(?:(?:0[1-9])|(?:1[0-2]))-(?:(?:0[1-9])|(?:(?:1|2)[0-9])|(?:3[0-1]))$/';

    // TODO:: Check the valid dates in MYSQL to create a proper pattern
    const VALIDATE_DATE_NUMERIC = '^\d{6,8}$';
    const DEFAULT_MYSQL_DATE = '1970-01-01';


     private  static $tableScheme;
     private  static $table; 
     private static $primaryKey;
    




 

private  function prepareValues(&$stmt){
  
 foreach(static::$tableScheme as $column => $type) {

  $stmt->bindValue(":{$column}" , $this->$column , $type );
  
 }
}
  static  function  bulidNamedParamsSql (){
  $namedParams = ''; 
  foreach(static::$tableScheme as $columns => $type){
    $namedParams .=  $columns . ' =:' .$columns .", ";

  }

  return trim($namedParams , ', ');
 }
public function create ( ){
  $con =  Database::getInstance();



 $sql =  'INSERT INTO  ' . static::$table . '  SET  ' .  self::bulidNamedParamsSql();
 var_dump($sql);
 
 $stmt = $con->prepare($sql);
   
 $this->prepareValues($stmt);
 if($stmt->execute()) {
  $this->{static::$primaryKey} = $con->lastInsertId();
  return true;
}
return false;
}


public function update ($id){

  $con = Database::getInstance();
  $sql =  'update ' . static::$table . ' SET ' .  self::bulidNamedParamsSql(). ' WHERE ' .static::$primaryKey .' = ' . $id;

  
  $stmt = $con->prepare($sql);
  
 $this->prepareValues($stmt);
  //  var_dump ($stmt);
  
  return $stmt->execute();

 
 }


 public function updateWithOptions ($id , $column){

  
  $con = Database::getInstance();
  $sql =  'update ' . static::$table . ' SET ' .  self::bulidNamedParamsSql(). ' WHERE ' . $column .' = ' . $id;

    var_dump($sql);
  $stmt = $con->prepare($sql);
  
 $this->prepareValues($stmt);
  //  var_dump ($stmt);
  
  return $stmt->execute();

 
 }


//  public function save (){
//   // var_dump($this->{static::$primaryKey});
//   return $this->{static::$primaryKey} === null ? $this->create() :  $this->save();
//  }

 public function delete ($id){
 
  $con =  Database::getInstance();
  $sql =  'delete from ' . static::$table . ' WHERE ' .static::$primaryKey .'  =  ' . $id;
    var_dump($sql);
  $stmt =  $con->prepare($sql);
 $this->prepareValues($stmt);
   // var_dump ($stmt);
  
  return $stmt->execute();
 
 
 }


 public function deleteWithoutPrkey ($id , $column) 
 {
   
 
  $con =  Database::getInstance();
  $sql =  'delete from ' . static::$table . ' WHERE ' .$column .'  =  ' . $id;
  


  $stmt =  $con->prepare($sql);
 $this->prepareValues($stmt);
  
  
  return $stmt->execute();
 
 
 }

 public static function getAll ( ){
  
  $con =  Database::getInstance();
  $sql =  'select * from ' . static::$table ;
  // var_dump($sql);  echo "<br>";
  // var_dump(new Database());
// var_dump($con);
  $stmt = $con->prepare($sql);
  // var_dump($stmt); echo "<br>";
  // self::prepareValues($stmt);
  //  var_dump ($stmt);
  
  // return $stmt->execute() == true ? $stmt->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE , get_called_class(), array_keys(static::$tableScheme)): false;
 

$sql = 'SELECT * FROM ' . static::$table;
$con =  $con =  Database::getInstance();
$stmt = $con->prepare($sql);
$stmt->execute();
if(method_exists(get_called_class(), '__construct')) {
  $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableScheme));
} else {
  $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
}

if ((is_array($results) && !empty($results))) {
    
  return new \ArrayIterator($results);
};
return false;
 
 }
 public static function getByPk ($pk ){
$con  = Database::getInstance();
  $sql =  'select * from ' . static::$table  .' where '. static::$primaryKey . '  =  ' .$pk ;

    
  $stmt =  $con->prepare($sql);

   // var_dump ($stmt);
  
 if ( $stmt->execute() == true)  
 {
 $obj = $stmt->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE , get_called_class(), array_keys(static::$tableScheme));
    
 return !empty($obj) ? array_shift($obj) : false;
  }
 else {
   return false;
     }
 
 }


 public static function getBy($columns, $options = array())
 {

    
     $whereClauseColumns = array_keys($columns);
     $whereClauseValues = array_values($columns);
     $whereClause = [];
     for ( $i = 0, $ii = count($whereClauseColumns); $i < $ii; $i++ ) {
         $whereClause[] = $whereClauseColumns[$i] . ' = "' . $whereClauseValues[$i] . '"';
     }
     $whereClause = implode(' AND ', $whereClause);
     $sql = 'SELECT * FROM ' . static::$table . '  WHERE ' . $whereClause;
    // var_dump($sql);
 
     return static::get($sql, $options);
 }

 public static function get($sql, $options = array())
 {
    $con = Database::getInstance();
  
     $stmt =$con->prepare($sql);
   
     if (!empty($options)) {
         foreach ($options as $columnName => $type) {
             if ($type[0] == 4) {
                 $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                 $stmt->bindValue(":{$columnName}", $sanitizedValue);
             } elseif ($type[0] == 5) {
                 if (!preg_match(self::VALIDATE_DATE_STRING, $type[1]) || !preg_match(self::VALIDATE_DATE_NUMERIC, $type[1])) {
                     $stmt->bindValue(":{$columnName}", self::DEFAULT_MYSQL_DATE);
                     continue;
                 }
                 $stmt->bindValue(":{$columnName}", $type[1]);
             } else {
                 $stmt->bindValue(":{$columnName}", $type[1], $type[0]);
             }
         }
     }
     $stmt->execute();
     if(method_exists(get_called_class(), '__construct')) {
         $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableScheme));
     } else {
         $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
     }
     if ((is_array($results) && !empty($results))) {

  
         return new \ArrayIterator($results);
     }

     return false;
 }

 public static function getOne($sql, $options = array())
 {
     $result = static::get($sql, $options);
   
     return $result === false ? false : $result->current();
 }

 public static function getModelTableName()
 {
     return static::$table;
 }
}





