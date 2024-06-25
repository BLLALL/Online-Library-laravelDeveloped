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

    public function preview(Book $book)
    {
        if (Storage::disk('public')->exists("$book->book")) {
            return response()->file(Storage::path("public/$book->book"));
        }
    }

    public function bookstore()
    {
        return view('store.index', [
            'books' => Book::where('price', '>', 0)->latest()->get()
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('title');
        $book = Book::where('title', 'LIKE', "%{$query}%");
        return response()->json($book->get());
    }

    public function store(Request $request)
    {
        try {

            $bookCoverPath = $request->file('bookCover')->store('book_covers', 'public');
            $bookPath = $request->file('book')->store('books', 'public');
            $attributes = $request->validate([
                'title' => 'required',
                'author_id' => 'required|exists:authors,id',
                'category_id' => 'required|exists:categories,id',
                'bookCover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'book' => 'required|mimes:pdf,epub|max:50000',
                'description' => 'required|string|min:20',
                'price' => 'numeric|min:0',
            ]);
            $book = new Book();
            $book->title = $attributes['title'];
            $book->author_id = $attributes['author_id'];
            $book->category_id = $attributes['category_id'];
            $book->bookCover = $bookCoverPath;
            $book->book = $bookPath;
            $book->description = $attributes['description'];
            $book->price = $attributes['price'] ?? 0;
            $book->save();

            return response()->json(['success' => 'Book added successfully.'], 201);
        } catch (\Exception $exception) {
            \Log::error('Error saving book: ' . $exception->getMessage());
            return response()->json(['error' => ' An error occurred while saving the book.'], 500);
        }
    }

    public function destroy(Book $book)
    {
        Storage::delete($book->bookCover);
        Storage::delete($book->book);
        $book->delete();
        return response()->json(['success' => 'You have successfully deleted author.']);

    }
}
