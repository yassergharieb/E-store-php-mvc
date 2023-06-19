<?php
namespace app\lib;

// define('DS', DIRECTORY_SEPARATOR);

/**
 * Application Constants
 */
// define('APP_PATH', dirname(realpath(__FILE__)) . DS . '..'); 

/**
 * Registering autoload function
 */

class Autoload
{
    public static function autoload ( $className )
    {
         $className; 
    
        $class = str_replace('app', '', $className);
       
        $classFile = APP_PATH . DIRECTORY_SEPARATOR . strtolower($class) . '.php';
      
        if(file_exists($classFile)) {
        
     
            require $classFile;
        }
    }
}
spl_autoload_register(__NAMESPACE__ .'\Autoload::autoload');