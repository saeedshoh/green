<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'             => 'required|min:1',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            'points_per_visit'  => 'required|numeric|min:1',
            'phone'             => 'required',
            'working_hours'     => 'required',
            'address'           => 'required|min:1',
            'category_id'       => 'required|numeric',
            'lat'               => 'required|numeric|between:-90,90',
            'lng'               => 'required|numeric|between:-180,180'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lat.required' => 'Определите адрес заведения на карте',
            'lng.required' => 'Определите адрес заведения на карте'
        ];
    }
}
