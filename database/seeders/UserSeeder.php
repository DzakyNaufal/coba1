<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (!User::where('email', 'user1@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'user1@mail.com',
                'password' => Hash::make('password'), // Use a secure password
                'role' => 'user', // Assuming there's a role field
            ]);
        }
    }
}
