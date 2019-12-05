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
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:30',
            'phone' => ['nullable','regex:/^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/'],
            'country_id' => ['nullable|numeric', 'exists:countries, id'],
            'city' => 'nullable|string|max:30',
            'address' => 'required|string',
            'zip_code' => ['nullable','regex:/^\d{6}$/'],
            'card_id' => ['required|numeric', 'exists:cards, id'],
            'card_number' => ['required','regex:/^(\d{4}\-\d{4}\-\d{4}\-\d{4})$/'],
            'month' => ['required','date_format: m'],
            'year' => ['required', 'date_format: Y']
        ];
    }
}
