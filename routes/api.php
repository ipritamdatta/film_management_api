<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// For Film
Route::apiResource('/films','FilmController');

// For Comment
Route::group(['prefix'=>'films'],function(){
    Route::apiResource('/{film}/comments','CommentController');
});