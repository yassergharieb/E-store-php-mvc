<?php

namespace app\lib;

class Messenger {


    const PRIMARY_COLOR = 'bg-primary';
    const DANGER_COLOR = 'bg-danger';
    const SUCCSESS_COLOR = 'bg-success';
    const SESCONDERY_COLOR = 'bg-secondary';
    const WARNING_COLOR = 'bg-warning';
    const INFO_COLOR = 'bg-info ';
    const LIGHT_COLOR = 'bg-light';
    const WHITE_COLOR = 'bg-white';



    private static $instance;
    private  $session;

    private   $messages =  [];

    

    private function  __construct($session)
    {
        $this->session = $session;
    }

    private function  __clone()
    {
        
    }
    
  


    public static function getInstance(SessionManager $session) {
        if (self::$instance ==  null) {
            self::$instance = new self($session);
        }
        return self::$instance;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }



    public function __get($name)
    {
        return $this->$name;
    }

public function add ($message , $type = self::SUCCSESS_COLOR){
    if (!$this->MessageExist()) {
            $this->session->messages = [];
    }

        $msgs = $this->session->messages;
        $msgs[] = [$message, $type];
        $this->session->messages = $msgs;
       
       
}




    public  function MessageExist() {
        return isset($this->session->messages);
    } 



    public function  getMessages() {
        if ($this->MessageExist()) {
            $this->messages = $this->session->messages;
            unset($this->session->messages);
            return $this->messages;
        }
        return [];
    }
}