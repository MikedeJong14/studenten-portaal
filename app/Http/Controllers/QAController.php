<?php

namespace App\Http\Controllers;

use App\Models\QA;
use Auth;
use \Illuminate\Http\Request;

class QAController extends Controller
{
    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        if (Auth::check()) {
            return view('createQuestion');
        } else {
            return redirect('auth/login');
        }
    }
    /**
     * Method submitQuestion
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitQuestion(Request $request)
    {
        $Question = new QA;
        $Question->question = $request->input('question');
        $Question->save();
        return redirect('ask-question');
    }
}
