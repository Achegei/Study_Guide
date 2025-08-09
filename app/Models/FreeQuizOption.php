<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreeQuizOption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'free_quiz_id',
        'option',
        'is_correct',
    ];

    /**
     * Get the quiz that owns the option.
     */
    public function freeQuiz(): BelongsTo
    {
        return $this->belongsTo(FreeQuiz::class);
    }
}
