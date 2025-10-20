<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizAttempt extends Model
{
     protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'skipped_count',
        'question_order',
        'completed',
    ];

    protected $casts = [
        'question_order' => 'array',
        'completed' => 'boolean',
    ];

    // ✅ Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }
    public function userAnswers()
{
    return $this->hasMany(UserAnswer::class);
}

}
