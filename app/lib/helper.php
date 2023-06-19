<?php 


namespace  app\lib;
trait Helper {

public   function  redirect($path) {

    session_write_close();
    header('location: ' .  $path);
    exit;

}


public  static function ReDirec($path) {

    session_write_close();
    header('location: ' .  $path);
    exit;

}


}