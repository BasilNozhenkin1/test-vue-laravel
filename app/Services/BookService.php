<?php

namespace App\Services;

use App\Models\Book;

class BookService implements Service
{
    public function index()
    {
        $books = Book::query()
            ->with('author')
            ->get();

        return $books;
    }


    public function store($data)
    {
        $book = Book::query()
            ->create($data);

        return $book;
    }

    public function update($data)
    {
        // TODO: Implement update() method.
    }

    public function destroy($data)
    {
        // TODO: Implement delete() method.
    }
}