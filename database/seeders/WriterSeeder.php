<?php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::create([
            'name' => 'ali',
            'phone' => '09185644652',
            'age' => 25,
            'gender' => 'male',
            'email' => 'ali@gmail.com',
        ]);

    }
}
