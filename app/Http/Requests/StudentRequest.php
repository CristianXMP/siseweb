<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'city' => 'required',
            'type_document' => 'required',
            'number_document' => 'required|min:10|max:10',
            'date_expedition' => 'required',
            'birth_date' => 'required',
            'course' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'first_name.required' => 'El campo del primer nombre es obligatorio!'
        ];
    }
}
