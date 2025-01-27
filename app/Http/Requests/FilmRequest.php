<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:255|unique:films',
            'description'   => 'required',
            'release'       => 'required',
            'date'          => 'required',
            'rating'        => 'required|max:5',
            'ticket'        => 'required',
            'price'         => 'required|max:10',
            'country'       => 'required',
            'photo'         => 'required'
        ];
    }
}
