<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'fname' => 'required',
			'lname' => 'required',
			'email' => 'required',
			'birth_date' => 'required|date',
			'hired_date' => 'required|date',
			'street' => 'required',
			'town' => 'required',
			'city' => 'required',
			'country' => 'required',
			'phone' => 'required',
			'gender' => 'required|in:male,female'
        ];
    }
}
