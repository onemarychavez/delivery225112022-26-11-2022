<?php

namespace App\Controllers;

class Home extends BaseController
{   
    protected $request,$session;
    
    

    public function index()
    {
        return view('home/index');
    }
}
