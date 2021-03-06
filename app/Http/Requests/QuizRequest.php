<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'title'                 => 'required|min:2',
            'points_for_passing'    => 'required|integer|min:1',
            'start'                 => 'required|after:'.now()->subMinute(),
            'ending'                => 'required|after:'.now()->parse(request()->start),
            'variants'              => 'required|array|exclude'
        ];
    }
}
