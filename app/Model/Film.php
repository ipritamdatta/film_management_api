<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name', 'slug', 'description','release','date','rating','ticket','price','country','photo','genre_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
