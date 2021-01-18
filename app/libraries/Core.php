<?php

class Core
{
    //App core class
    //Create Url & load controllers
    //URl Method -/controller/method/params

    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Check first value of Url in controllers
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                
                unset($url[0]);
            }
            
        }

        require_once '../app/controllers/' . $this->currentController . '.php'; //execute controller eg.index

        $this->currentController = new $this->currentController; //to check method in current controller
        
        //check method
        if (isset($url[1])){
            if (method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
            //print_r($url);
        }

        //Get params

        $this->params = $url ? array_values($url) : [];
        // print_r($this->params);
        // exit;
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        
    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // convert string to array
            return $url;
        }
    }
}
