<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'published_at',
    ];
    public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}

}
