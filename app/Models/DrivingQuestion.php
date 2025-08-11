<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingQuestion extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default plural of the model name
    // (e.g., if model is DrivingQuestion, default table is driving_questions)
    // protected $table = 'driving_questions'; // Only needed if different from 'driving_questions'

    protected $fillable = [
        'driving_section_id',
        'question',
        'choices',
        'correct_answer',
        'audio_url',
    ];

    protected $casts = [
        'choices' => 'array', // Cast the JSON column to an array
    ];

    /**
     * Get the driving section that owns the question.
     */
    public function drivingSection()
    {
        return $this->belongsTo(DrivingSection::class);
    }
}
