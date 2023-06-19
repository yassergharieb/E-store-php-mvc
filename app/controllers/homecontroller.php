<?php 

namespace  app\controllers;

class HomeController extends AbstractController {

public function  index() {
$this->langauge->load('template.common');
       
$this->renderview();
    
}

public function add (){
    $this->renderview();
}

}