<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create(['nama' => 'Islam']);
        Agama::create(['nama' => 'Kristen']);
        Agama::create(['nama' => 'Hindu']);
        Agama::create(['nama' => 'Buddha']);
        Agama::create(['nama' => 'Konghucu']);
    }
}
