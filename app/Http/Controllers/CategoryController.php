<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->filter(request(['search']))->get()
        ]);
    }

    public function show(Category $category)
    {
        return view('categories.show', [
           'category' => $category
        ]);
    }
}
