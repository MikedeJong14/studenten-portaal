<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class DocentController extends Controller
{
    public function index()
    {
        return view('docent.index');
    }
    public function vragen()
    {
        return view('docent.vragen');
    }
    public function gesprekken()
    {
        return view('docent.gesprekken');
    }
}
