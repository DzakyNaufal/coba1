<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AgamaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the AgamaSeeder
        $this->call(AgamaSeeder::class);

        // Call the AgamaSeeder
        $this->call(StatusSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(UserSeeder::class);
    }
}
