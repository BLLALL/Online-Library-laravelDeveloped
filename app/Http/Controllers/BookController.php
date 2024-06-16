<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\FBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::latest()->filter(request(['search']))->get(),

        ]);
    }

    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function download(Book $book)
    {

        if (Storage::disk('public')->exists("$book->book")) {
            return Storage::disk('public')->download("$book->book");
        }
        return view('books.show', ['book' => $book]);
    }
    public function preview(Book $book) {
        if (Storage::disk('public')->exists("$book->book")) {
            return response()->file(Storage::path("public/$book->book"));
        }
    }

    public function bookstore() {
        return view('store.index', [
            'books' => Book::where('price', '>', 0)->latest()->get()
        ]);
     }

}
