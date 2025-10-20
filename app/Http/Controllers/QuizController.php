<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('categories')->latest()->paginate(10);
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('quizzes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'total_questions' => 'required|integer|min:1',
            'max_skips' => 'required|integer|min:0',
            'categories' => 'array'
        ]);

        $quiz = Quiz::create($request->only('title', 'total_questions', 'max_skips'));
        $quiz->categories()->sync($request->categories);

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('categories', 'questions');
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $categories = Category::all();
        return view('quizzes.edit', compact('quiz', 'categories'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update($request->only('title', 'total_questions', 'max_skips'));
        $quiz->categories()->sync($request->categories);

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('success', 'Quiz deleted!');
    }
}
