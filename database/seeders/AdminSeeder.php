<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (!User::where('email', 'admin1@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin1@mail.com',
                'password' => Hash::make('password'), // Use a secure password
                'role' => 'admin', // Assuming there's a role field
            ]);
        }
    }
}
