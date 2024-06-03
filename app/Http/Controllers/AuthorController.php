<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::latest()->filter(request(['search']))->get()
        ]);
    }

    public function show(Author $author)
    {
        return view('authors.show', [
            'author' => $author
        ]);
    }
}
