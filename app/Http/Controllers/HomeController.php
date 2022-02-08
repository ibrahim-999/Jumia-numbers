<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * render the index page
     *
     * @return view
     */
    public function index()
    {
        return view('index');
    }
}
