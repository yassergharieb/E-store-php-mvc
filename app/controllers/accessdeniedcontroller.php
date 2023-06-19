<?php




namespace app\controllers;

use app\lib\Helper;
use app\models\User;

class accessdeniedController extends AbstractController {
    use Helper;


public function index() {
        
    $this->langauge->load('auth.login');
    $this->langauge->load('auth.accessdenied');

    $this->langauge->load('template.common');
    $this->renderview();


} 
}
