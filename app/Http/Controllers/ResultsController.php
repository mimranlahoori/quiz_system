<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
        public function index()
    {
        $results = UserQuizAttempt::with('quiz', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('results.index', compact('results'));
    }
       public function show($attemptId)
    {
        $attempt = UserQuizAttempt::with(['quiz.questions', 'userAnswers.question'])->findOrFail($attemptId);

        $total = $attempt->quiz->questions->count();
        $correct = $attempt->userAnswers->where('is_correct', true)->count();
        $wrong = $attempt->userAnswers->where('is_correct', false)->count();
        $skipped = $attempt->userAnswers->whereNull('selected_option')->count();

        $percentage = round(($correct / $total) * 100, 2);

        return view('results.show', compact('attempt', 'total', 'correct', 'wrong', 'skipped', 'percentage'));
    }
}
