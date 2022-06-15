<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'email'     => 'required|email|unique:employees,email' . $this->update(),
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'password'  => 'nullable|confirmed|min:8|max:64',
        ];
    }

    protected function update()
    {
        if ($this->getMethod() != 'POST') {
            return ',' . $this->employee->id;
        }
    }

}
