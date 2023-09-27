<?php

namespace App\Controllers;

use Learn\Crud\View ;

class HomeController
{
    public function index($id = 0, $id2= 0)
    {
        $data['home_title'] = 'Home page';
        $data['contnet'] = 'this is the home';  
        View::load('home', $data);
    }
}
