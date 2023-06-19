<?php

namespace app\lib;

class Langauge
{


  protected $dictionary = [];
  public function load($path)
  {
    $path_arr = explode('.', $path);
    $app_lang = APP_DEFAULT_LANG;
    if (isset($_SESSION['lang'])) {
      $app_lang = $_SESSION['lang'];
    }
    $langfile = LANGAUGES . $app_lang . DS . $path_arr[0] . DS . $path_arr[1] . '.lang.php';


    if (file_exists($langfile)) {
      require $langfile;

      if (is_array($_) && !empty($_)) {
        foreach ($_ as $key => $value) {
          $this->dictionary[$key] = $value;


        }

        // trigger_error('this '. $value . 'dosn\'t exist', E_USER_NOTICE);

      }
    }
  }



  public function get($key)
  {
    if (array_key_exists($key, $this->dictionary)) {
      
      return $this->dictionary[$key];
    }
  }

  public function feedKey($key, $data)
  {
    if (array_key_exists($key, $this->dictionary)) {
      array_unshift($data, $this->dictionary[$key]);
    
    
      return call_user_func_array('sprintf', $data);
    }
  }




  public function getDictionary()
  {

    return $this->dictionary;
  }

}