<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    // Use a custom table name since 'progress' is a reserved keyword in some systems
    protected $table = 'user_progress';

    protected $fillable = [
        'user_id',
        'course_section_id',
        'last_question_id',
    ];

    /**
     * Get the user that owns the progress.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course section that the progress is for.
     */
    public function courseSection()
    {
        return $this->belongsTo(CourseSection::class);
    }
}
