<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'teamname' => 'admin',
            'email' => 'admin@himsiunair.com',
            'password' => hash::make('a'),
            'role' => 'admin',
            'active' => 0,
        ]);

    }
}
