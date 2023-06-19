<?php
namespace  app\controllers;
class NotfoundController extends AbstractController  {


    public  function notfound()  {
        $this->langauge->load('template.common');
        $this->langauge->load('notfound.index');
        $this->renderview();
    }



}