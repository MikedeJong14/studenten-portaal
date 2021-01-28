<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\QA;
use Auth;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Livewire\Component;

class Questions extends Component
{
    public $filter;

    public function render()
    {
        $user = new User;
        $category = new Category;

        switch ($this->filter) {
            case 'answeredOnly':
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

        return view('livewire.questions', ['questions' => $questions, 'user' => $user, 'category' => $category, 'answers' => $answers]);
    }
}
