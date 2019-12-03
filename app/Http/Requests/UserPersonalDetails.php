<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonalDetails extends FormRequest
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
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:30',
            'phone' => ['regex:/^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/'],
            'address' => 'string',
            'zip_code' => ['regex:/^\d{6}$/'],
            'card_number' => ['regex:/^(\d{4}\-\d{4}\-\d{4}\-\d{4})$/'],
            'expiration_date' => ['regex:/^(0[1-9]|1[012])[- \/.](19|20)\d\d$/']
        ];
    }
}
