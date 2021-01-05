<?php

namespace App\Http\Controllers;

class QAController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return view('createQuestion');
        } else {
            return redirect('auth/login');
        }
    }
    public function submitQuestion()
    {

        return view('ask-question');
    }
}
