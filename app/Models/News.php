<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'source_url',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
