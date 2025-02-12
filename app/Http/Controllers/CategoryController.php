<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    // List all categories
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
