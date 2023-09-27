<?php

namespace Learn\Crud;

class View
{
    public static function load($view_name, $params= [])
    {
        $file =  VIEWS . $view_name . '.php';
        if(file_exists($file)){

            extract($params);

            ob_start();
            require_once($file);
            ob_end_flush();
            
        }else{
            echo "this " . $view_name . " view not exist !";
        }
        
    }
}
