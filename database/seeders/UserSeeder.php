<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        User::factory()->count(1)->create([
            'email' => 'admin@example.com', // Specify the admin user's email
            'username' => 'admin', // Specify the admin user's username
            'password' => Hash::make('adminpassword'), // Specify the admin user's password
        ]);
    }

}
