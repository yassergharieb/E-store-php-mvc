<?php


namespace app\models;


class suppliers  extends AbstractModel
{

   
   
    public $suplier_id ;
    public $name;
    public $phone_number;
    public $Email;
    public $address;

    

    protected static $table = 'suppliers';

    protected static $tableScheme = array(
        
        'name' => self::DATA_TYPE_STRING,
        'phone_number' => self::DATA_TYPE_STRING,
        'Email' => self::DATA_TYPE_STRING,
        'address' => self::DATA_TYPE_STRING,

        

    );

    protected static $primaryKey = 'suplier_id';


}
