<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content',
    ];

    public function owner(){

        return $this->belongsTo(User::class);

    }

    public function comments(){

        return $this->hasMany(Comment::class)->latest();

    }

}
