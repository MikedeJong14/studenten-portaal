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
			'title' => 'afwezigheid',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        Appointment::insert([
        	'user_id' => '1',
        	'teacher_id' => '4',
			'title' => 'slechte cijfers',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '1',
        	'teacher_id' => '4',
			'title' => 'informeren',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '2',
        	'teacher_id' => '4',
			'title' => 'informeren',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '2',
        	'teacher_id' => '4',
			'title' => 'afwezigheid',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '2',
        	'teacher_id' => '4',
			'title' => 'slechte cijfers',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '3',
        	'teacher_id' => '4',
			'title' => 'slechte cijfers',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '3',
        	'teacher_id' => '4',
			'title' => 'informeren',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Appointment::insert([
        	'user_id' => '3',
        	'teacher_id' => '4',
			'title' => 'afwezigheid',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'date' => Carbon::now()->format('Y-m-d H:i:s'),
        	'time_period' => 1.75,
            'accepted' => false,
            'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
