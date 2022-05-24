<?php

namespace App\Services;

use App\Models\Author;

class AuthorService implements Service
{
    public function index()
    {
        $authors = Author::query()
            ->withCount('books')
            ->get();

        return $authors;
    }


    public function store($data)
    {
        $author = Author::query()
            ->create($data);

        return $author;
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