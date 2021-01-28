<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::insert([
            'question' => 'Waar kan ik goed stagebedrijven opzoeken?',
            'user_id' => 1,
            'answer_id' => 1,
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Question::insert([
            'question' => 'Waar kan ik mijn schoolboeken bestellen?',
            'user_id' => 2,
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Question::insert([
            'question' => 'Wat vind Da Vinci van het dragen van een pet op school?',
            'user_id' => 3,
            'answer_id' => 2,
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Question::insert([
            'question' => 'Wanneer is de ouderavond?',
            'user_id' => 1,
            'category_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Question::insert([
            'question' => 'Wat zijn de openingstijden van de kantine?',
            'user_id' => 2,
            'answer_id' => 3,
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Question::insert([
            'question' => 'Bij wie kan ik mij aanmelden voor werken op school tijdens de lockdown?',
            'user_id' => 3,
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
