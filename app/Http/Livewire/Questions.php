<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\QA;
use App\Models\User;
use Livewire\Component;

class Questions extends Component
{
    public function render()
    {
        $User = new User;
        $questions = QA::all();
        $Category = new Category;

        return view('livewire.questions', ['questions' => $questions, 'user' => $User, 'Category' => $Category]);
    }
}
