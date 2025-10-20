<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::whereNull('cate_parent_id')->get();
        return view('categories.create', compact('parents'));
    }
// app/Http/Controllers/CategoryController.php

public function show($id)
{
    $category = Category::with('quizzes')->findOrFail($id);
    return view('categories.show', compact('category'));
}

    public function edit(Category $category)
    {
        $parents = Category::whereNull('cate_parent_id')->get();
        $categories = Category::with('parent')->get();

        return view('categories.edit', compact('parents', 'category', 'categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'cate_name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug',
        ]);

        Category::create($request->only('cate_name', 'slug', 'cate_parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category created!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cate_name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->only('cate_name', 'slug', 'cate_parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }
    // app/Http/Controllers/CategoryController.php
public function detachQuiz($categoryId, $quizId)
{
    $category = Category::findOrFail($categoryId);

    // ye pivot table se unlink karega
    $category->quizzes()->detach($quizId);

    return back()->with('success', 'Quiz successfully detached from this category!');
}


}
