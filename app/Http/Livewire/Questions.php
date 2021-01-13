<?php

namespace App\Http\Livewire;

use App\Models\QA;
use App\Models\User;
use Livewire\Component;

class Questions extends Component
{
    public function render()
    {
        $User = new User;
        $questions = QA::all();
        return view('livewire.questions', ['questions' => $questions, 'user' => $User]);
    }
}
