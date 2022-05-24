<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    private $authorService;

    public function __construct()
    {
        $this->authorService = app(AuthorService::class);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $authors = $this->authorService->index();

        return response()->json(
            AuthorResource::collection($authors)
        );
    }

    public function store($request)
    {

    }

    public function update($request)
    {

    }

    public function destroy($request)
    {

    }
}