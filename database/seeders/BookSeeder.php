<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    const BOOKS_SEEDED = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(self::BOOKS_SEEDED)->create();
    }
}
