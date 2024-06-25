<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->filter(request(['search']))->get()
        ]);
    }

    public function getCategories()
    {
        return response()->json(Category::all());
    }

    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('name');
            $categories = Category::where('name', 'LIKE', "%{$query}%")->get();
            return response()->json($categories);
        } catch (\Exception $e) {
            log::error($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('category_photo')) {
            $image_path = $request->file('category_photo')->store('category_photos', 'public');
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->category_photo = $image_path;
        $category->save();
        return response()->json(['message' => 'Category added successfully']);

    }

    public function destroy(Category $category)
    {
        try {
            Storage::delete($category->category_photo);
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully']);
        }
        catch (\Exception $e) {
            log::error('Error destroying a category: ' . $e->getMessage());
        }
    }
}
