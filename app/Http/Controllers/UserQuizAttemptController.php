<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizAttemptController extends Controller
{
    public function index()
    {
        // $attempts = Auth::check()
        //     ? auth()->user()->quizAttempts()->with('quiz')->latest()->get()
        //     : \App\Models\UserQuizAttempt::with('quiz')->latest()->get();

        $attempts = UserQuizAttempt::with('quiz')->where('user_id', Auth::id())->latest()->get();
        return view('attempts.index', compact('attempts'));
    }
    public function start(Quiz $quiz)
    {
        $attempt = UserQuizAttempt::firstOrCreate(
            ['user_id' => Auth::id(), 'quiz_id' => $quiz->id, 'completed' => false],
            [
                'question_order' => $quiz->questions->pluck('id')->shuffle()->toArray(),
                'current_question' => 1,
            ]
        );

        $questionOrder = is_array($attempt->question_order)
            ? $attempt->question_order
            : json_decode($attempt->question_order, true);

        // 👇 check karte hain user ne kitne answer diye hain
        $answeredCount = UserAnswer::where('user_quiz_attempt_id', $attempt->id)->count();

        // 👇 resume from the unanswered question
        $nextIndex = $answeredCount < count($questionOrder) ? $answeredCount : 0;
        $currentQuestionId = $questionOrder[$nextIndex] ?? null;

        $question = Question::find($currentQuestionId);

        return view('attempts.start', compact('quiz', 'attempt', 'question'));
    }


    public function answer(Request $request, UserQuizAttempt $attempt, Question $question)
{
    $validated = $request->validate([
        'selected_option' => 'nullable|string|in:a,b,c,d',
    ]);

    $userAnswer = UserAnswer::firstOrNew([
        'user_quiz_attempt_id' => $attempt->id,
        'question_id' => $question->id,
    ]);

    if ($request->has('skip')) {
        if ($attempt->skipped_count < $attempt->quiz->max_skips) {
            $attempt->increment('skipped_count');
            $userAnswer->selected_option = null;
            $userAnswer->is_correct = null;
            $userAnswer->save();
        }
    } else {
        $userAnswer->selected_option = $validated['selected_option'];
        $userAnswer->is_correct = ($validated['selected_option'] === $question->correct_option);
        $userAnswer->save();

        if ($userAnswer->is_correct) {
            $attempt->increment('score');
        }
    }

    // 👇 Update current question progress
    $answeredCount = UserAnswer::where('user_quiz_attempt_id', $attempt->id)->count();
    $attempt->update(['current_question' => $answeredCount + 1]);

    return redirect()->route('attempts.next', $attempt->id);
}


    public function next(UserQuizAttempt $attempt)
    {
        $questionOrder = is_array($attempt->question_order)
            ? $attempt->question_order
            : json_decode($attempt->question_order, true);

        $answeredCount = UserAnswer::where('user_quiz_attempt_id', $attempt->id)->count();

        if ($answeredCount >= count($questionOrder)) {
            $attempt->update(['completed' => true]);
            return redirect()->route('results.show', $attempt->id);
        }

        $nextQuestionId = $questionOrder[$answeredCount] ?? null;
        $question = Question::find($nextQuestionId);
        $quiz = $attempt->quiz;

        return view('attempts.start', compact('quiz', 'attempt', 'question'));
    }
}
