<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3',
            'phone'     => 'required|digits:9|unique:users,phone' . $this->update(),
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ];
    }

    protected function update()
    {
        if ($this->getMethod() != 'POST') {
            return ',' . $this->user->id;
        }
    }

}
