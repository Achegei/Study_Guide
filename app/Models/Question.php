<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Question extends Model
{
    use HasFactory;

    // ✅ Updated $fillable array with your provided columns
    protected $fillable = [
        'course_section_id',
        'question', // The actual question text
        'choices',  // The options for the question
        'correct_answer',
    ];

    // ✅ Cast the 'choices' attribute to an array
    // This will automatically convert JSON from the database into a PHP array
    // and convert PHP arrays into JSON when saving to the database.
    protected $casts = [
        'choices' => 'array',
    ];

    /**
     * Get the course section that owns the question.
     */
    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }
}
