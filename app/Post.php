<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    
    protected $fillable = [
        'title', 'description', 'image', 'slug', 'is_published', 'appear_in', 'url', 'type'
    ];
}
