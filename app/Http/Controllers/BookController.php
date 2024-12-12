<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Services\BookService;
use App\Services\UserService;

class BookController extends Controller
{
    protected BookService $service;
    protected UserService $userService;

    public function __construct()
    {
        $this->service = new BookService();
        $this->userService = new UserService();
    }

    public function index()
    {
        $books = $this->service->getLatest();

        return view('book.index', compact('books'));
    }

    public function create()
    {
        $users = $this->userService->getLatest();

        return view('book.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('book.index')->with('success', 'Success add book');
    }

    public function edit(string $id)
    {
        $users = $this->userService->getLatest();
        $book = $this->service->get($id);

        return view('book.edit', compact('book', 'users'));
    }

    public function update(StoreRequest $request, string $id)
    {
        $this->service->update($request, $id);

        return redirect()->route('book.index')->with('success', 'Success edit book');
    }

    public function destroy(string $id)
    {
        $this->service->destroy($id);

        return redirect()->route('book.index')->with('success', 'Success delete book');
    }
}
