<?php


namespace app\lib;



class  Authentication {



    private static $instance;
    private static $session;
  public $_execludedRoutes = [
        '/home/index',
        '/auth/logout',
        '/auth/login',
        '/user/index',
        '/users/profile',
        '/users/changepassword',
        '/users/settings',
        '/language/default',
        '/auth/accessDendied',
        '/notfound/notfound',
        '/test/default'
    ];
    

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


    public function  isAuthorized () {

        return isset($this->session->u);

    }
   
    public function  hasAccess ($controller , $action) {

        $url = strtolower ("/" . $controller . "/" . $action);
     
      
        if (in_array($url , $this->_execludedRoutes) || in_array($url , $this->session->u->privileges)){
       
            return true;
        }

       

    }
   

 
}


