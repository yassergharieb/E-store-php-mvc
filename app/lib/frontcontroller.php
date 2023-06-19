<?php
namespace app\lib;

use app\controllers\NotFoundController;
use app\lib\Rigestery;

class FrontController
{
    use Helper;
    private $controller = "home";
    private $action = "index";
    private $params = [];
    protected $template;
    protected $rigestery;
    protected $auth;

    


    const NOT_FOUND_CONTROLLER = "app\controllers\\NotFoundController";
    const NOT_FOUND_ACTION = "NotFound";

    public function __construct(Template $template, Rigestery $rigestery , Authentication $auth)
    {
        $this->rigestery = $rigestery;
        $this->template = $template;
        $this->auth = $auth;
        $this->_parsurl();
    }


    private function _parsurl()
    {

        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
        $cleanUrl = str_replace("public", "", $url);



        $path = explode('/', trim($cleanUrl, "/"), 3);

        if (isset($path[0]) && $path[0] !== '') {
            $this->controller = $path[0];
        }


        if (isset($path[1]) && $path[1] !== '') {
            $this->action = $path[1];
        }


        if (isset($path[2]) && $path[2] !== '') {
            $this->params = explode("/", $path[2]);
        }
        

    }


    public function dispatch()
    {

       
        $controllerClassName = "app\controllers\\" . ucfirst($this->controller) . 'Controller';
         $actionName = $this->action;

      
         if(!$this->auth->isAuthorized())
         {

            if($this->controller != "auth" && $this->action != "login" ) 
            {
                $this->redirect('/public/auth/login');


                   
        

            } else  {
          
    
            if($this->controller == 'auth' && $this->action == 'login') {
            //   isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) :  false;

                }

                if (is_null($this->auth->hasAccess($this->controller , $this->action)))
         
                {
                   
                 $this->redirect('/public/accessdenied/accessdenied');
     
                }
               
           }
        }
     
         
        if (!class_exists($controllerClassName)) {
         
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
            $controller = new $controllerClassName();
         
        }
        $controller = new $controllerClassName();

        

        if (!method_exists($controller, $actionName)) {
            $this->action = $actionName = self::NOT_FOUND_ACTION;
        }

        $controller->setController($this->controller);
        $controller->setAction($this->action);
        $controller->setParams($this->params);
        $controller->setTemplate($this->template);
        $controller->setRegistery($this->rigestery);
        
        $controller->$actionName();


    

}



}
