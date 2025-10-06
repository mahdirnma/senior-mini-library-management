<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'book 1',
            'description' => 'lorem ipsum 1',
            'publication_date' => '2020-06-16',
        ]);
        Book::create([
            'title' => 'book 2',
            'description' => 'lorem ipsum 2',
            'publication_date' => '2023-08-20',
        ]);

    }
}
