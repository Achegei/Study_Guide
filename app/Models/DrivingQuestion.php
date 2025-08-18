<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingQuestion extends Model
{
    use HasFactory;

    // Assuming fillable properties are already defined, if not, add them.
    protected $fillable = [
        'title',
        'type', // Or whatever column holds the 'Driving Course' type if applicable
        'flag', // Or icon if you renamed it
        // Add other fillable attributes as per your table structure
    ];

     protected $casts = [
        'choices' => 'array', // ✅ This is the crucial line for automatic JSON to array conversion
    ];


    // ✅ Define many-to-many relationship to users
    public function usersWithAccess()
    {
        return $this->belongsToMany(User::class, 'driving_section_user', 'driving_section_id', 'user_id')->withTimestamps();
    }

    /**
     * Get the questions for the driving section.
     * This relationship is already defined and correctly links
     * a DrivingSection to its many DrivingQuestion instances.
     */
    public function questions()
    {
        return $this->hasMany(DrivingQuestion::class);
    }
}
