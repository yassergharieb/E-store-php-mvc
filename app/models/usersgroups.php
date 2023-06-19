<?php 
namespace  app\models;
use app\models\AbstractModel;
class Usersgroups extends AbstractModel {

// private   $id;
public  $groupId; 

public  $groupName; 



protected  static $table =  'users_groups';
protected  static $primaryKey =  'groupId';


public  static  $tableScheme = [
   'groupName' => self::DATA_TYPE_STRING,
   
 
    ];

   
}