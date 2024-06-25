<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::latest()->filter(request(['search']))->get()
        ]);
    }

    public function getAuthors() {
        return response()->json(Author::all());
    }

    public function show(Author $author)
    {
        return view('authors.show', [
            'author' => $author
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('name');
        $author = Author::where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($author);

    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'author_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:1024'
        ]);

        if ($request->hasFile('author_photo')) {
            $image_path = $request->file('author_photo')->store('author_photos', 'public');
        } else {
            return response()->json(['message' => 'File not uploaded.'], 400);
        }

        $author = new Author();
        $author->name = $attributes['name'];
        $author->author_photo = $image_path;
        $author->description = $attributes['description'];
        $author->save();
        return response()->json(['success' => 'You have successfully uploaded an author.']);
    }

    public function destroy(Author $author)
    {
        Storage::delete($author->author_photo);
        $author->delete();
        return response()->json(['success' => 'You have successfully deleted author.']);
    }


}
