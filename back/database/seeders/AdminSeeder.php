<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
    // User::create(
    //     [
    //         'first_name'=>"Rady",'last_name'=>"Y",
    //         'email'=>'admin@gmail.com','password'=>Hash::make("1234"),
    //         'profile'=>'631ed45c40a41_list_manager.png',
    //         'role'=>'admin'
    //     ]);

    User::create(['first_name'=>"Rady",'last_name'=>"Y", 
    'email' => 'admin@example.com', 
    'profile'=>'631ed45c40a41_list_manager.png',
    'password' => bcrypt('password'), 'role' => 'admin']);
        
    }
}
