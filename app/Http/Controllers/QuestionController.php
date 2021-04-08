<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;
use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if (back()->getTargetUrl() != url()->current()) {
            Session::put('oldUrl', back()->getTargetUrl());
        }
        return view('question.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'bail|required|unique:questions|min:20',
            'category' => 'required',
        ]);

        $question = new Question;
        $question->question = strtolower($request->input('question'));
        $question->user_id = Auth::id();
        $question->category_id = $request->input('category');
        $question->save();

        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        } else {
            return redirect('question/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $questionCategory = Category::find($question->category_id);
        $categories = Category::all();
        if (back()->getTargetUrl() != url()->current()) {
            Session::put('oldUrl', back()->getTargetUrl());
        }
        return view('question.edit', ['question' => $question, 'questionId' => $id, 'categories' => $categories, 'questionCategory' => $questionCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'bail|required|unique:questions|min:20',
            'category' => 'required',
        ]);

        $question = Question::find($id);
        $question->question = strtolower($request->input('question'));
        $question->user_id = Auth::id();
        $question->category_id = $request->input('category');
        $question->save();

        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        } else {
            return redirect('question/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return redirect()->back();
    }
    public function autocomplete(Request $request)
    {
        $data = Question::select("question")
            ->where("question", "LIKE", "%{$request->query}%")
            ->get();

        return response()->json($data);
    }
}
