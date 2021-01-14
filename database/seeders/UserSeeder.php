<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Dylan',
            'email' => 'dylan@test.com',
            'password' => '$2y$10$F3P3kn.bOOuwtaJ7e.C.JeycTUMBmlKaZTtBA27UAImFneQohU3WO',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::insert([
            'name' => 'Rutger',
            'email' => 'rutger@test.com',
            'password' => '$2y$10$F3P3kn.bOOuwtaJ7e.C.JeycTUMBmlKaZTtBA27UAImFneQohU3WO',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        User::insert([
            'name' => 'Mike',
            'email' => 'mike@test.com',
            'password' => '$2y$10$F3P3kn.bOOuwtaJ7e.C.JeycTUMBmlKaZTtBA27UAImFneQohU3WO',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        User::insert([
            'name' => 'Martijn',
            'email' => 'martijn@test.com',
            'password' => '$2y$10$F3P3kn.bOOuwtaJ7e.C.JeycTUMBmlKaZTtBA27UAImFneQohU3WO',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
