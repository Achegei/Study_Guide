<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_section_id',
        'question',
        'type', // Added 'type' for question distinction (e.g., 'Multiple Choice', 'True or False')
        'choices',
        'correct_answer',
        'audio_url',
    ];

    protected $casts = [
        'choices' => 'array', // This is the crucial line for automatic JSON to array conversion
    ];

    /**
     * Get the course section that owns the question.
     */
    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }
}
