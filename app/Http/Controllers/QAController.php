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
    public function update()
    {
        if (Auth::check()) {
            $questionUpdate = QA::find(Auth::id());
            return view('updateQuestion', ['question' => $questionUpdate]);
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
        $Question->userid = Auth::id();
        $Question->save();
        return redirect('ask-Question');
    }
    public function askQuestion()
    {

        $questions = QA::all()->toArray();

        return view('ask-Question', ['questions' => $questions]);
    }
}
