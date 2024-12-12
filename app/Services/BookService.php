<?php

namespace App\Services;

use App\Http\Requests\Book\StoreRequest;
use App\Models\Book;
use Illuminate\Support\Collection;

class BookService
{
    protected Book $book;

    public function __construct()
    {
        $this->book = new Book();
    }

    public function getLatest(): Collection
    {
        return $this->book->newQuery()->with('author')->latest()->get();
    }

    public function get(string $id): Book
    {
        return $this->book->newQuery()->find($id);
    }

    public function store(StoreRequest $storeRequest): void
    {
        $data = $storeRequest->toArray();

        $this->book->newQuery()->create($data);
    }

    public function update(StoreRequest $storeRequest, string $id): void
    {
        $book = $this->get($id);
        $data = $storeRequest->toArray();

        $book->newQuery()->update($data);
    }

    public function destroy(string $id): void
    {
        $book = $this->get($id);

        $book->newQuery()->delete();
    }
}
