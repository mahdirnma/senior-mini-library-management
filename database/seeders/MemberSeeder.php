<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'name' => 'reza',
            'phone' => '09185123652',
            'age' => 20,
            'gender' => 'male',
            'email' => 'reza@gmail.com',
        ]);

    }
}
