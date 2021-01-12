<?php

namespace App\Http\Livewire;

use App\Models\QA;
use Livewire\Component;

class Questions extends Component
{
    public function render()
    {
        $questions = QA::all();
        return view('livewire.questions', ['questions' => $questions]);
    }
}
