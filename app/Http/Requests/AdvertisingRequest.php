<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
            'title'         => 'required|min:1',
            'description'   => 'required|min:1',
            'deadline'      => 'required|min:1',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1000'
        ];
    }
}
