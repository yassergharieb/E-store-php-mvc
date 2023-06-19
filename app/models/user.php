<?php
namespace app\models;

use app\lib\Authentication;
use app\models\AbstractModel;
use app\Models\Userprofile;
use stdClass;

class User extends AbstractModel
{


    public $id;
    public $username;
    public $Email;
    public $Password;
    public $lastLogin;
    public $subscrbtiondate;
    public $groupId;
    public $Phonenumber;
    public $status;
    public $profile;
    public $privileges;

    public static $table = 'users';



    public static $tableScheme = [

        "username" => self::DATA_TYPE_STRING,
        "Email" => self::DATA_TYPE_STRING,
        "Password" => self::DATA_TYPE_STRING,
        "lastLogin" => self::DATA_TYPE_DATE,
        "subscrbtiondate" => self::DATA_TYPE_DATE,
        "groupId" => self::DATA_TYPE_INT,
        "Phonenumber" => self::DATA_TYPE_STRING,
        "status" => self::DATA_TYPE_INT

    ];
    public static $primaryKey = 'id';




    public function cryptPassword($password)
    {
        return $this->Password = crypt($password, APP_SALT);
    }



    public static function getAll()
    {
        return self::get(
            'SELECT au.*, aug.groupName groupName FROM ' . self::$table
            . ' au INNER JOIN users_groups aug ON aug.groupId = au.groupId'
        );
    }


    public static function getUser(stdClass $user)
    {
        return self::get(
            'SELECT au.*, aug.groupName groupName FROM ' . self::$table
            . ' au INNER JOIN users_groups aug ON aug.groupId = au.groupId WHERE au.id !=' . $user->id
        );
    }


    public static function userExists($username)
    {


        return self::get('
            SELECT * FROM ' . self::$table . ' WHERE Username = "' . $username . '"
        ');
    }


    public static function EmailExists($Email)
    {


        return self::get('
            SELECT * FROM ' . self::$table . ' WHERE Email = "' . $Email . '"
        ');
    }







    public static function authenticate($email, $password, $session)
    {


        $password = crypt($password, APP_SALT);
        $sql = 'SELECT * , (SELECT groupName FROM users_groups WHERE users_groups.groupId = ' . self::$table . '.groupId) groupName  FROM ' . self::$table . ' WHERE Email = "' . $email . '" AND password = "' . $password . '"';
        $foundUser = self::getOne($sql);
        
      
        // var_dump($sql);

        $id = $foundUser->id;


        if ($foundUser != false) {


            if ($foundUser->status == 2) {
                return 2;
            }



            $foundUser->lastLogin = date('Y-m-d H:i:s');
            $foundUser->update($id);
            $foundUser->profile = Userprofile::getByPK($foundUser->id);
          
            $foundUser->privileges = Usersgroupprivilege::getPrivilegesForGroup($foundUser->groupId);
            echo "<pre>";

            $auth = Authentication::getInstance($session);
        //    var_dump ($auth->_execludedRoutes);
        //    echo "<pre>";
        //     var_dump($foundUser);
        //     die();
           
            $session->u = $foundUser;
       
        
            
            return 1;

        } else {
            return false;

        }


    }
}