<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome()
    {
        return view('auth.login');
    }

    public function index()
    {
        return view('home');
    }

    public function report()
    {
        return view('report');
    }
}
