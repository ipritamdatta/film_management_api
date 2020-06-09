<?php

namespace App\Http\Resources\Film;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'release' => $this->release,
            'date' => $this->date,
            'rating' => $this->rating,
            'ticket' => $this->ticket,
            'price' => $this->price,
            'country' => $this->country,
            'photo' => $this->photo,
            'genre_id' => $this->genre_id,
            'href' => [
                'comments' => route('comments.index',$this->id)
                //URL: /api/films/{film}/comments
            ]
        ];
    }
}
