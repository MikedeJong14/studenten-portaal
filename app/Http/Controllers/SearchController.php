<?php

namespace App\Http\Controllers;

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
        //dd($question);
        if (count($question) > 0) {
            return view('search/index', ['question' => $question, 'q' => $q]);
        } else {
            return view('search/index');
        }
    }
}
