<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'teamname' => 'admin',
            'email' => 'admin@himsiunair.com',
            'password' => hash::make('admin123'),
            'role' => 'admin',
            'active' => 0,
        ]);
    }
}
