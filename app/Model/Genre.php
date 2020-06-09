<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function films(){
        return $this->hasMany(Film::class);
    }
}
