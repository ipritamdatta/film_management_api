<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
