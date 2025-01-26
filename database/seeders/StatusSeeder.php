<?php

namespace Database\Seeders;

use App\Models\Status;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['nama' => 'Mahasiswa UMY']);
        Status::create(['nama' => 'Bukan Mahasiswa UMY']);
    }
}
