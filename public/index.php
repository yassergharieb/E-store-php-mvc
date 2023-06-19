<?php 
use app\controllers\LangaugeController;
use app\lib\Authentication;
use app\lib\Rigestery;
use app\lib\FrontController;
use app\lib\langauge;
use app\lib\Messenger;
use app\lib\SessionManager;
use app\lib\Template;










if(!defined('DS')) {
    define('DS' , DIRECTORY_SEPARATOR);
}

require_once '..'.DS. 'app'.DS. 'config.php';
$temp_parts =  require_once '..'.DS. 'app'.DS. 'layoutconfig.php';

require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';


$session = new SessionManager();

$session->start();


if (!isset($session->lang)) {
   $session->lang = APP_DEFAULT_LANG;
}
$template = new Template($temp_parts);
$langauge = new Langauge();


$rigestery = Rigestery::getInstance();
$messenger = Messenger::getInstance($session);
$rigestery->messenger = $messenger;
$rigestery->session = $session;
$rigestery->langauge = $langauge;
$auth = Authentication::getInstance($session);
$frontcontroller = new FrontController($template , $rigestery , $auth );

$frontcontroller->dispatch();


