<?php 

namespace  app\lib;

use Exception;

trait ValidateInput {

public  function ValidateString ($input) {

   
        return  htmlentities(strip_tags($input) , ENT_QUOTES , 'utf-8');

       


  

    
    }

    
 



public static function  filterINt ($input) {


        return  filter_var($input , FILTER_SANITIZE_NUMBER_INT); ;
}

}