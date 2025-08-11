<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DrivingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'capital',
        'flag',
        'description',
        'summary_audio_url',
    ];

    /**
     * This method will be updated later in Step 6 to link to DrivingQuestion.
     * Get the questions for the driving section.
     */
    public function questions()
    {
    return $this->hasMany(DrivingQuestion::class);
 }
}
