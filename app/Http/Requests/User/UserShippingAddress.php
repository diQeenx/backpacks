<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserShippingAddress extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_id' => ['required', 'exists:countries,id'],
            'city' => 'required|string|max:30',
            'address' => 'required|string',
            'zip_code' => ['required','regex:/^\d{6}$/'],
        ];
    }
}
