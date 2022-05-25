<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DeleteAuthorRequest;
use App\Http\Requests\Library\StoreAuthorRequest;
use App\Http\Requests\Library\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
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
        , 200);
    }

    public function store(StoreAuthorRequest $request): \Illuminate\Http\JsonResponse
    {
        $author = $this->authorService->store($request->validated());

        return response()->json(
            new AuthorResource($author)
        , 201);
    }

    public function update(UpdateAuthorRequest $request, Author $author): \Illuminate\Http\JsonResponse
    {
        $authorUpdated = $this->authorService->update($request->validated(), $author);

        return response()->json(
            new AuthorResource($authorUpdated)
        , 200);
    }

    public function destroy(DeleteAuthorRequest $request, Author $author): \Illuminate\Http\JsonResponse
    {
        $this->authorService->destroy($author);

        return response()->json(
            [
                'message' => 'Успешное удаление автора'
            ]
        , 200);
    }
}