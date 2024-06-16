<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $bookId = $request->input('book_id');

        DB::table('f_books')->insert([
            'user_id' => $userId,
            'book_id' => $bookId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['message' => 'Book added to favorites'], 200);
    }

    public function destroy(Request $request)
    {
        $userId = $request->input('user_id');
        $bookId = $request->input('book_id');

        DB::table('f_books')->where('user_id', $userId)->where('book_id', $bookId)->delete();

        return response()->json(['message' => 'Book removed from favorites'], 200);
    }
}
