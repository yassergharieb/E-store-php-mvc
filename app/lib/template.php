<?php
namespace app\lib;

class Template
{




    protected $temp_parts;
    protected $actionview;
    protected $data;


    protected $rigestery;



    /**
     */
    public function __construct(array $parts)
    {
        $this->temp_parts = $parts;
    }


    public function  __get($name)
    {
     return   $this->rigestery->$name;
    }
    public function setActionView($view_path)
    {
        $this->actionview = $view_path;
    }



    public function swapTemplate($template) {
        $this->temp_parts['layout'] = $template;
    }

    public function setAppData($data)
    {
        $this->data = $data;


    }


    public function setRegistery($rigestery)
    {
        $this->rigestery = $rigestery;

    }


    private function renderHeader()
    {
        extract($this->data);
        include APP_PATH . DS . 'layout' . DS . 'header.php';


    }


    private function renderSidebbar()

    {
        extract($this->data);
      
     
        include APP_PATH . DS . 'layout' . DS . 'sidebar.php';



    }
    private function renderNavbar()
    {
        extract($this->data);
        include APP_PATH . DS . 'layout' . DS . 'navbar.php';


    }
    private function renderFooter()
    { 
        extract($this->data);
        include APP_PATH . DS . 'layout' . DS . 'footer.php';


    }

    private function renderHeaderResources()
    {
        $output = '';
        if (!array_key_exists('headerresources', $this->temp_parts)) {
            trigger_error('not exist');

        } else {
            $headerResources = $this->temp_parts['headerresources'];
            // $css = $headerResources['css'];
            // echo gettype($css);
            if (!empty($headerResources)) {
            
                foreach ($headerResources as $cssKey => $link) {
                
                
                    
                  
     $output .= '<link type = "text/css" rel = "stylesheet"  href ="' . $link . '" />';

                    }

                }
            

        }
        echo $output;
    }



    private function renderFooterResources()
    {
        $output = '';
        if (!array_key_exists('footerrescourses', $this->temp_parts)) {
            trigger_error('not exist');

        } else {
            $footerresources = $this->temp_parts['footerrescourses'];
            $js = $footerresources['js'];
          

            if (!empty($js)) {
                foreach ($js as $key => $value) {
                
                    $output .= '<script src="' . $value . '" > </script>';
                
                    

                }
            }

        }
        echo $output;
    
    }




    private function RenderTemplate()
    {
        if (!array_key_exists('layout', $this->temp_parts)) {
            trigger_error("this key dosn't exist");
        } else {
            $parts = $this->temp_parts['layout'];
            if (!empty($parts)) {
                foreach ($parts as $part => $file) {
                    if ($part === ':view') {
                        extract($this->data);
                        require_once $this->actionview;
                    } else {

                        require_once $file;
                    }


                }
            }
        }

    }








    public function renderApp()
    {
        extract($this->data);
        

      
        $this->renderHeader();
        $this->renderHeaderResources();
        $this->renderSidebbar();
        $this->renderNavbar();
        // ob_start();
        $this->RenderTemplate();
        $this->renderFooterResources();
        $this->renderFooter();
        // ob_end_flush();
    }

 
}

