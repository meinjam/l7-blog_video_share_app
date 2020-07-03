<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {
    
    protected $fillable = [
        'title', 'description', 'image', 'slug', 'is_published', 'url', 'appear_in',
    ];
}
