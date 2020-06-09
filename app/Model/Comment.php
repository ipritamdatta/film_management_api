<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
        'name','comment','film_id'
    ];

    public function film(){
        return $this->belongsTo(Film::class);
    }
}
