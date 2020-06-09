<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('films.index');
});

Auth::routes();