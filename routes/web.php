<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('films.index');
});
Route::get('/film/{id}','FilmFrontendController@show');

Auth::routes();