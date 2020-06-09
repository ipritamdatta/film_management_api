<?php

namespace App\Http\Controllers;

use App\Model\Film;
use Illuminate\Http\Request;
use App\Http\Resources\Film\FilmResource;
use App\Http\Resources\Film\FilmCollection;
use App\Http\Requests\FilmRequest;
use Illuminate\Support\Str;

class FilmController extends Controller
{
    // Authorization to create, edit, update & delete the film
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilmCollection::collection(Film::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $film               = new Film();
        $film->name         = $request->name;
        $film->slug         = Str::slug($request->name,'-');
        $film->description  = $request->description;
        $film->release      = $request->release;
        $film->date         = $request->date;
        $film->rating       = $request->rating;
        $film->ticket       = $request->ticket;
        $film->price        = $request->price;
        $film->country      = $request->country;
        $film->photo        = $request->photo;
        // need to use storage link for image
        // need to work on selecting genre id
        // genre_id
        $film->genre_id        = $request->genre_id;
        $film->save();

        return response([
            'data' => new FilmResource($film)
        ], 201); //Here 201 is for HTTP_CREATED

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
