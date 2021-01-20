<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function questions()
    {
        return view('home.questions');
    }
}
