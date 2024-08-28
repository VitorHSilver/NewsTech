<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'source',
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
