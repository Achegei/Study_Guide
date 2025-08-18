<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseSection extends Model
{
    use HasFactory;

    // ✅ Updated $fillable array with your provided columns
    protected $fillable = [
        'title',
        'type',
        'capital',
        'flag', // Assuming 'flag' is the column name for flag_path
        'description',
        'summary_audio_url',
    ];

    /**
     * Get the questions for the course section.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // ✅ Define many-to-many relationship to users who have access to this course section
    public function usersWithAccess()
    {
        return $this->belongsToMany(User::class, 'course_section_user', 'course_section_id', 'user_id')->withTimestamps();
    }
}
