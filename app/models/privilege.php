<?php

namespace app\models;


class privilege  extends AbstractModel
{

   
   
    public $privlige_id ;
    public $privlige;
    public $privlige_title;

    protected static $table = 'users_privliges';

    protected static $tableScheme = array(
        'privlige_id' => self::DATA_TYPE_INT,
        'privlige' => self::DATA_TYPE_STRING,
        'privlige_title' => self::DATA_TYPE_STRING
    );

    protected static $primaryKey = 'privlige_id';


}