<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function film(){
        return $this->belongsTo(Film::class);
    }
}
