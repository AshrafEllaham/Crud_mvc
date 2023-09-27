<?php


namespace Learn\Crud;
/**
 * front end controller class
 */
class App
{
    
    protected $controller;
    protected $action;
    protected $params;
    public function __construct()
    {
        $this->perpareUrl();

        $this->render();
    }


    /**
     * extract controller, metdod and parametrs
     *
     * @return void
     */
    private function perpareUrl()
    {
        $url = $_SERVER['REQUEST_URI'];

        if ($url != '/') {
            
            $url = explode('/', trim($url, DIRECTORY_SEPARATOR));

            // define the controller
            $this->controller = isset($url[0]) ? controllers_path() . ucwords($url[0]) . 'Controller' : controllers_path() . 'HomeController';

            // define the action
            $this->action = isset($url[1]) ? $url[1] : 'index';

            // delete conrtroller and action from url
            unset($url[0], $url[1]);

            // set params
            $this->params = !empty($url) ? array_values($url) : [];
        }else{
             $this->controller = controllers_path() . "HomeController";
             $this->action = "index";
             $this->params = [];
        }
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    private function render()
    {
        if(class_exists($this->controller)){
            $controller = new $this->controller;

            if(method_exists($controller, $this->action)){
                
                call_user_func_array([$controller, $this->action], $this->params);
                
            }else{
                echo 'mehod not exist !';
            }

        }else{
            View::load('404');
        }
    }


}
