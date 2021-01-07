<?php

namespace App\Http\Livewire;

use app\Models\QA;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        'body' => 'test',
        'created_at' => 'tes',
        'user' => 'tet',
    ];
    public $newComment;

    public function addQuestion()
    {
        array_unshift($this->comments[] = [
            'body' => '',
            'created_at' => '',
            'creator' => '']
        );

    }
    public function render()
    {
        $questions = QA::all();
        return view('livewire.comments', ['questions' => $questions]);
    }
}
