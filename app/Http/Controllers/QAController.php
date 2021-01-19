<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view('createQuestion', ['categories' => $categories]);
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
        $request->validate([
            'question' => 'bail|required|unique:posts|min:20',
            'category' => 'required',
        ]);
        $Question = new QA;
        $Question->question = $request->input('question');
        $Question->userid = Auth::id();
        $Question->save();
        return redirect('ask-question');
    }
    /**
     * Method updateQuestion
     *
     * @param Request $request [explicite description]
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function updateQuestion(Request $request, $id)
    {
        $Question = QA::find($id);
        $Question->question = $request->input('question');
        $Question->userid = Auth::id();
        $Question->save();
        return redirect('ask-question');
    }
    /**
     * Method askQuestion
     *
     * @return void
     */
    public function askQuestion()
    {

        return view('ask-question');
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
        return redirect('ask-question');
    }
}
