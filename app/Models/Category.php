<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['slug', 'cate_name', 'cate_parent_id', 'cate_link'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'cate_parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'cate_parent_id');
    }

    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, 'quiz_category_pivot', 'category_id', 'quiz_id');
    }
}
