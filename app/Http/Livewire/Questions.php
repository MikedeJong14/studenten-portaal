<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Questions extends Component
{
    use WithPagination;
    public $filter;
    public $search;
    public $sortField;
    public $sortDirection = 'asc';
    public $sortBy = '';
    public $cat;

    public function filter($value)
    {
        dd($value);
    }

    public function render()
    {
        $user = new User;
        $category = new Category;

        switch ($this->filter) {
            case 'answeredOnly':
                // if (!isset($request)) {
                //     $questions = Question::whereNotNull('answer_id')->where('category_id', '=', $this->cat)->sortBy('category_id')->get();
                //     dd($questions);
                //     break;}
                $questions = Question::whereNotNull('answer_id')->get();
                break;
            case 'unansweredOnly':
                $questions = Question::whereNull('answer_id')->get();
                break;
            case 'fromUserOnly':
                $questions = Question::where('user_id', '=', Auth::id())->get();
                break;
            default:
                $questions = Question::all();
        }

        $answers = Answer::all();
        //->orderBy($this->sortField, $this->sortDirection)->paginate(10)

        return view('livewire.questions', ['questions' => $questions, 'user' => $user, 'category' => $category, 'answers' => $answers, 'categorys' => Category::all()]);
    }
}
