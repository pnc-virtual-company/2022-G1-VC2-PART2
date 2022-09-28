<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name' => '',
            'email' => 'timsave98@gmail.com',
            'password' => 'admin123',
            'role' => 'admin',
            'status' => 'actived',
        ]);
    }
}
