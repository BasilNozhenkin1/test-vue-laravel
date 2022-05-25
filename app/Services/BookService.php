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

    public function update($data, $entity)
    {
        $entity->update($data);

        return $entity;
    }

    public function destroy($entity)
    {
        if ($entity->exists())
        {
            $entity->delete();
        }
    }
}