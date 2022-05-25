<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\DeleteBookRequest;
use App\Http\Requests\Library\StoreBookRequest;
use App\Http\Requests\Library\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
    private $bookService;

    public function __construct()
    {
        $this->bookService = app(BookService::class);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $books = $this->bookService->index();

        return response()->json(
            BookResource::collection($books)
        , 200);
    }

    public function store(StoreBookRequest $request): \Illuminate\Http\JsonResponse
    {
        $book = $this->bookService->store($request->validated());

        return response()->json(
            new BookResource($book)
        , 201);
    }

    public function update(UpdateBookRequest $request, Book $book): \Illuminate\Http\JsonResponse
    {
        $bookUpdated = $this->bookService->update($request->validated(), $book);

        return response()->json(
            new BookResource($bookUpdated)
        , 200);
    }

    public function destroy(DeleteBookRequest $request, Book $book): \Illuminate\Http\JsonResponse
    {
        $this->bookService->destroy($book);

        return response()->json(
            [
                'message' => 'Успешное удаление книги'
            ]
            , 200
        );
    }
}