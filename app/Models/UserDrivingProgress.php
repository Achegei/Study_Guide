<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDrivingProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driving_section_id', // Make sure this matches the foreign key in your migration
        'last_question_id',
    ];

    /**
     * Get the user that owns this progress record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the driving section this progress record belongs to.
     */
    public function drivingSection()
    {
        return $this->belongsTo(DrivingSection::class);
    }
}
