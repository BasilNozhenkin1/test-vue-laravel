<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\StoreBookRequest;
use App\Http\Resources\BookResource;
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
        );
    }

    public function store(StoreBookRequest $request): \Illuminate\Http\JsonResponse
    {
        $book = $this->bookService->store($request->validated());

        return response()->json(
            new BookResource($book)
        );
    }

    public function update($request): \Illuminate\Http\JsonResponse
    {
        $book = $this->bookService->update($request->validated());

        return response()->json(
            new BookResource($book)
        );
    }

    public function destroy($request): \Illuminate\Http\JsonResponse
    {
        $book = $this->bookService->destroy($request->validated());

        return response()->json(
            new BookResource($book)
        );
    }
}