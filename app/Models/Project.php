<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'github_url',
        'live_url',
        'is_featured',
        'technologies',
        'images',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'technologies' => 'array',
        'images' => 'array',
    ];
}
