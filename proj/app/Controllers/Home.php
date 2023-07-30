<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message', ['title' => 'Welcome to CI 4']);
        return $this->twigDisplay(
            view: 'welcome_message',
            data: ['title' => 'Welcome to CI 4 + Twig 3']
        );
    }
}
