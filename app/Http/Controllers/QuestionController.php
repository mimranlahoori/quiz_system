<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        $questions = Question::with('quiz')->get();
        return view('questions.index', compact('quiz', 'questions'));
    }

    public function create(Quiz $quiz)
    {
        return view('questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_option' => 'required|string|in:a,b,c,d',
        ]);

        $quiz->questions()->create($request->all());
        return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Question added!');
    }
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:a,b,c,d',
        ]);

        $question->update($validated);

        return redirect()->route('quizzes.show', $question->quiz_id)->with('success', 'Question updated successfully!');
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Question deleted!');
    }
}
