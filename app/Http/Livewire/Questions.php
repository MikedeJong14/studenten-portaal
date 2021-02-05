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

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
        ? $this->reverseSort()
        : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
        ? 'desc'
        : 'asc';
    }

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
        //->orderBy($this->sortField, $this->sortDirection)->paginate(10)

        return view('livewire.questions', ['questions' => $questions, 'user' => $user, 'category' => $category, 'answers' => $answers, 'categorys' => Category::all()]);
    }
}
