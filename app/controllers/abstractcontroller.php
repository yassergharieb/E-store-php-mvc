<?php

namespace app\controllers;

use app\lib\FrontController;
use app\Lib\Validate;
use app\lib\ValidateInput;

class AbstractController
{

    use Validate;
   

    protected $controller;
    protected $action;
    protected $params;
    protected $template;

    protected $rigestery;
 

    public $data = [];

    public function  __get($name)
    {
     return   $this->rigestery->$name;
    }

    public function notfound()
    {
        $this->langauge->load('template.common');
        $this->langauge->load('emoloyee.index');


        $this->renderview();
    }


    public function setController($controllerName)

    {
       
        $this->controller = $controllerName;

    }


    


    public function setAction($actionName)
    {
        $this->action = $actionName;

    }
    public function setParams($paramsName)
    {
        $this->params = $paramsName;

    }


    public function setTemplate($template)
    {
        $this->template = $template;

    }

    public function setRegistery($rigestery)
    {
        $this->rigestery = $rigestery;

    }


 
  


    public function renderview()
    {

        ob_start();

        $view = VIEW_PATH . $this->controller . DS . $this->action . ".view.php";

    
        if ($this->action == FrontController::NOT_FOUND_ACTION ||!file_exists($view) ) {
            $view = VIEW_PATH . "notfound" . DS . 'notfound.view.php';
        }


        $this->data = array_merge($this->data, $this->langauge->getDictionary());

        $this->template->setRegistery($this->rigestery);
        $this->template->setActionView($view);
        $this->template->setAppData($this->data);
        $this->template->renderApp();
           
    }
            


}
