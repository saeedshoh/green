<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'ball_for_u_connect'                    => 'required|integer|min:1',
            'maximum_distance_between_addresses'    => 'required|integer|min:1',
            'using_qr_places'                       => 'required|integer|min:1',
        ];
    }
}
