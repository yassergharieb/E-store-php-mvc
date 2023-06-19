<?php


namespace app\controllers;

use app\lib\Helper;
use app\models\User;

class AuthController extends AbstractController {
    use Helper;
public  function  login () {

       

        $this->template->swapTemplate([
        
            ":view" => "action_view"
        ]);
        
       
    $this->langauge->load('auth.login');

    $this->langauge->load('template.common');
 
       
    if(isset($_POST['submit'])) {

         
        User::authenticate($_POST['UEmail'], $_POST['Upass'], $this->session);
        
            

     
        $this->redirect('/public/user/index');



    }

    $this->renderview();
      
}


public function  logout() {
        $this->session->kill();
        // unset($_SESSION);
        $this->redirect('/public/auth/login');
} 





}
