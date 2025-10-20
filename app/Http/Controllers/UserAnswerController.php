<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    public function store(Request $request)
    {
        $question = Question::findOrFail($request->question_id);

        $isCorrect = $question->correct_option === $request->selected_option;

        UserAnswer::updateOrCreate(
            [
                'user_quiz_attempt_id' => $request->attempt_id,
                'question_id' => $request->question_id,
            ],
            [
                'selected_option' => $request->selected_option,
                'is_correct' => $isCorrect,
            ]
        );

        return response()->json(['correct' => $isCorrect]);
    }
}
