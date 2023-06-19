<?php

namespace app\lib;

class Rigestery {
    private static $instance;
    

    private function  __construct()
    {
        
    }

    private function  __clone()
    {
        
    }
    
  


    public static function getInstance() {
        if (self::$instance ==  null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }



    public function __get($name)
    {
        return $this->$name;
    }

}