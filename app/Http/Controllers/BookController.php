<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->get();

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('book.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Book::create($request->toArray());

        return redirect()->route('book.index')->with('success', 'Success add book');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $users = User::all();

        return view('book.edit', compact('book', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Book $book)
    {
        $book->update($request->all());

        return redirect()->route('book.index')->with('success', 'Success edit book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Success delete book');
    }
}
