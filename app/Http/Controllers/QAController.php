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
        return view('createQuestion');
    }
    public function update($id)
    {
        $questionUpdate = QA::find($id);
        return view('updateQuestion', ['question' => $questionUpdate, 'id' => $id]);

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
    public function updateQuestion(Request $request, $id)
    {
        $Question = QA::find($id);
        $Question->question = $request->input('question');
        $Question->userid = Auth::id();
        $Question->save();
        return redirect('ask-Question');
    }
    /**
     * Method askQuestion
     *
     * @return void
     */
    public function askQuestion()
    {

        return view('ask-Question');
    }
    /**
     * Method guest
     *
     * @return void
     */
    public function guest()
    {
        $questions = QA::all()->toArray();

        return view('/Q&A', ['questions' => $questions]);
    }
    public function delete($id)
    {
        QA::find($id)->delete();
        return redirect('ask-Question');
    }
}
