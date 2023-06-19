<?php
namespace app\Models;

class Userprofile extends AbstractModel
{
    public $userId;
    public $firstname;
    public $lastname;
    public $address;
    public $DOB;
    public $image;

    protected static $table = 'user_profile';

    protected static $tableScheme = array(
        'userId'            => self::DATA_TYPE_INT,
        'firstname'         => self::DATA_TYPE_STRING,
        'lastname'          => self::DATA_TYPE_STRING,
        'address'           => self::DATA_TYPE_STRING,
        'DOB'               => self::DATA_TYPE_DATE,
        'image'             => self::DATA_TYPE_STRING
    );

    protected static $primaryKey = 'userId';
}