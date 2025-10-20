<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\UserQuizAttempt;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_quizzes' => Quiz::count(),
            'total_categories' => Category::count(),
            'total_questions' => Question::count(),
            'total_attempts' => UserQuizAttempt::count(),
        ];

        // recent quizzes aur attempts
        $recent_quizzes = Quiz::latest()->take(5)->get();
        $recent_attempts = UserQuizAttempt::with('user', 'quiz')->latest()->take(5)->get();

        return view('dashboard.index', compact('data', 'recent_quizzes', 'recent_attempts'));
    }
}
