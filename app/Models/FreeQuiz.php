<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FreeQuiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
    ];

    /**
     * Get the options for the free quiz.
     */
    public function options(): HasMany
    {
        return $this->hasMany(FreeQuizOption::class);
    }
}
