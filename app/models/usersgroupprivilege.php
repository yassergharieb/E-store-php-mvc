<?php
namespace app\models;
use app\models\AbstractModel;

class Usersgroupprivilege extends AbstractModel {
    public $id;
    public $privilge_id;

    public $group_id;
    public static $table = "users_groups_privilges";
    public static $primaryKey = 'id';
    public static $tableScheme = [
        "privilge_id" => self::DATA_TYPE_INT,
        "group_id" => self::DATA_TYPE_INT


    ];



    public static function getGroupPrivileges(Usersgroups $group) {
        $groupPrivileges = self::getBy(['GroupId' => $group->groupId]);
        $extractedPrivilegesIds = [];
        if(false !== $groupPrivileges) {
            foreach ($groupPrivileges as $privilege) {
                $extractedPrivilegesIds[] = $privilege->PrivilegeId;
            }
        }
        return $extractedPrivilegesIds;
    }


    public static function getPrivilegesForGroup($groupId)
    {
        // $sql = 'SELECT ugp.*, up.privlige FROM ' . self::$table . ' ugp';
        // $sql .= ' INNER JOIN users_privliges up ON up.privlige_id = ugp.privilge_id';
        // $sql .= ' WHERE ugp.group_id = ' . $groupId;



        $sql1 = 'SELECT  privlige_title , privlige  FROM ' . self::$table ;
        $sql1 .= ' INNER JOIN users_privliges  ON privlige_id = privilge_id';
        $sql1 .= ' WHERE group_id = ' . $groupId;
        var_dump($sql1);
        $privileges =  self::get($sql1);
        echo "<pre>";
        var_dump($privileges);
        $extractedUrls = [];
        if(false !== $privileges) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->privlige;
            }
        }
        return $extractedUrls;
    }

}