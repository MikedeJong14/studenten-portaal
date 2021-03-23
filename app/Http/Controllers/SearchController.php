<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $q = strtolower($request->input('q'));
        $questions = Question::where('question', 'LIKE', '%' . $q . '%')->get();
        $answer = new Answer;
        $category = new Category;
        $appointments = Appointment::where([
            ['user_id', Auth::user()->id],
            ['title', 'LIKE', '%' . $q . '%']
        ])->get();
        $teacher = new User;
        if (count($questions) > 0 || count($appointments) > 0) {
            return view('search/index', ['questions' => $questions, 'q' => $q, 'answer' => $answer, 'category' => $category, 'appointments' => $appointments, 'teacher' => $teacher]);
        } else {
            return view('search/index');
        }
    }
}
