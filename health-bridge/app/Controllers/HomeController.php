<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        // Load the view for the landing page
        return view('home/landing_page');
    }
}
