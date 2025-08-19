<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'status', // Assuming you have a 'status' column for 'PUBLISHED'
        'updated_at', // Important for sitemap's lastModificationDate
        // Add any other columns that you want to be mass assignable here
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // If you store dates as strings in your DB, casting them to datetime
            // will make them Carbon instances, useful for setLastModificationDate.
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    // You can add relationships here if your posts are related to other models (e.g., users, categories)
    // For example:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
