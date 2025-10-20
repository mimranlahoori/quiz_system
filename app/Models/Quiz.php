<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    /** @use HasFactory<\Database\Factories\QuizFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'total_questions',
        'max_skips',
    ];

    // ✅ Relations
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'quiz_category_pivot');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userAttempts()
    {
        return $this->hasMany(UserQuizAttempt::class);
    }

        public function attempts(): HasMany
    {
        return $this->hasMany(UserQuizAttempt::class);
    }
}
