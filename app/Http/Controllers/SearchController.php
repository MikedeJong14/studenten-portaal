<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
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
        $q = $request->input('q');
        $question = Question::where('question', 'LIKE', '%' . $q . '%')->get();
        $answer = new Answer;
        $category = new Category;
        if (count($question) > 0) {
            return view('search/index', ['question' => $question, 'q' => $q, 'answer' => $answer, 'category' => $category]);
        } else {
            return view('search/index');
        }
    }
}
