<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QA::insert([
            'question' => 'when is lunch time?',
        ]);
        QA::insert([
            'question' => 'when is dinner time?',
        ]);
        QA::insert([
            'question' => 'when is bedtime?',
        ]);
    }
}
