<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'source_url',
        'publish_date',
        'publish_time',
        'location',
        'author_alias',
        'terms_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
