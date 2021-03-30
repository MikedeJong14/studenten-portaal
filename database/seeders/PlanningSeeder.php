<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Carbon\Carbon;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::insert([
        	'user_id' => '1',
        	'teacher_id' => '4',
        	'title' => 'Afwezigheid',
        	'description' => 'Gesprek over het langdurig afwezig zijn tijdens lesuren.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 30,
            'accepted' => false,
            'school_year' => 'onderbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        Appointment::insert([
        	'user_id' => '1',
        	'teacher_id' => '5',
        	'title' => 'Go / No go',
        	'description' => 'Bespreken over de voortgang van de student betreft het behandelen van processen rond projecten in de werkomgeving.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 45,
            'accepted' => false,
            'school_year' => 'bovenbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '2',
        	'teacher_id' => '4',
        	'title' => 'Afwezigheid',
        	'description' => 'Gesprek over het langdurig afwezig zijn tijdens lesuren.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 30,
            'accepted' => false,
            'school_year' => 'onderbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        Appointment::insert([
        	'user_id' => '2',
        	'teacher_id' => '5',
        	'title' => 'Go / No go',
        	'description' => 'Bespreken over de voortgang van de student betreft het behandelen van processen rond projecten in de werkomgeving.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 45,
            'accepted' => false,
            'school_year' => 'bovenbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '3',
        	'teacher_id' => '4',
        	'title' => 'Afwezigheid',
        	'description' => 'Gesprek over het langdurig afwezig zijn tijdens lesuren.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 30,
            'accepted' => false,
            'school_year' => 'onderbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        Appointment::insert([
        	'user_id' => '3',
        	'teacher_id' => '5',
        	'title' => 'Go / No go',
        	'description' => 'Bespreken over de voortgang van de student betreft het behandelen van processen rond projecten in de werkomgeving.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 45,
            'accepted' => false,
            'school_year' => 'bovenbouw',
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
    }
}
