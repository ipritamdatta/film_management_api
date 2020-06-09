<?php

namespace App\Exceptions;

use Exception;

class FilmNotBelongsToUser extends Exception
{
    public function render(){
        return [
            'errors' => 'Film Not Belongs To User'
        ];
    }
}
