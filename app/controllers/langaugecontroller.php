<?php 
namespace app\controllers;

use app\controllers\AbstractController;
use app\lib\Helper;

class LangaugeController extends AbstractController
{
    use Helper;
    public function index()
    {

      if ($_SESSION['lang'] == 'ar') {
            $_SESSION['lang'] = 'en';
      } else {
        $_SESSION['lang'] = 'ar';
      }



        $this->redirect($_SERVER['HTTP_REFERER']);

    }

    
        //


    }
