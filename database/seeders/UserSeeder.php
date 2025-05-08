<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Creating 3 users with different roles
        User::create([
            
            'email' => 'jmathiaka@rafiki.co.ke',
            'password' => Hash::make('Rafiki2025'), // Make sure to hash the password
            
        ]);

        User::create([
            
            'email' => 'emurigi@rafiki.co.ke',
            'password' => Hash::make('Rafiki2025'),
           
        ]);

        User::create([
            
            'email' => 'user2@example.com',
            'password' => Hash::make('Rafiki2025'),
            
        ]);
    }
}
