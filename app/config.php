<?php 



if(!defined('DS')) {
    define('DS' , DIRECTORY_SEPARATOR);
}



define('APP_PATH' ,  realpath(dirname(__FILE__)));
define('VIEW_PATH' ,  APP_PATH.DS.'views'.DS);
define('LAYOUT_PATH', APP_PATH . DS . 'layout' . DS);
define('LANGAUGES', APP_PATH . DS . 'langs' . DS);


define('CSS',  '/css/' ) ;
define('JS', '/js/');
define('LIB', '/lib/');
define('SCSS', '/scc/');




defined('DB_HOST_NAME') ? null :  define('DB_HOST_NAME' , 'localhost');
defined('DB_NAME') ? null :  define('DB_NAME' , 'storedb');
defined('DB_USER') ? null :  define('DB_USER' , 'root');
defined('DB_PASSWORD') ? null :  define('DB_PASSWORD' , '');
defined('DB_PORT_NUMBER') ? null :  define('DB_PORT_NUMBER' , 3306);
defined('DB_DRIVER') ? null :  define('DB_DRIVER' , 1);
defined('APP_DEFAULT_LANG') ? null : define('APP_DEFAULT_LANG', 'ar');
defined('APP_SALT')     ? null : define ('APP_SALT', '$2a$07$yeNCSNwRpYopOhv0TrrReP$');



defined('SESSION_NAME') ? null : define('SESSION_NAME', 'E_STORE_SESSION');
defined('SESSION_LIFE_TIME') ? null : define('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH') ? null : define('SESSION_SAVE_PATH', APP_PATH. DS. "..". DS . 'sessions');








// Check for access privileges
defined('CHECK_FOR_PRIVILEGES') ? null : define('CHECK_FOR_PRIVILEGES', 1);

// define the path to our uploaded files
defined('UPLOAD_STORAGE')     ? null : define ('UPLOAD_STORAGE', APP_PATH . DS . '..' . DS . 'public' . DS . 'uploads');
defined('IMAGES_UPLOAD_STORAGE')     ? null : define ('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'images');
defined('DOCUMENTS_UPLOAD_STORAGE')     ? null : define ('DOCUMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . DS . 'documents');
defined('MAX_FILE_SIZE_ALLOWED')     ? null : define ('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));




