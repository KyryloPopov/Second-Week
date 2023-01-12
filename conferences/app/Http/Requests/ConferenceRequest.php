<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:255',
            'date' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'country_id' => 'required|integer',
            'user_id' => 'integer',
        ];
    }
}
