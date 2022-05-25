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