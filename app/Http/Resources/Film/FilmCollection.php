<?php

namespace App\Http\Resources\Film;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'release' => $this->release,
            'rating' => $this->rating,
            'photo' => $this->photo,
            'price' => $this->price,
            'href' => [
                'link' => route('films.show',$this->id)
            ]
        ];
    }
}
