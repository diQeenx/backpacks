<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserPaymentDetails extends FormRequest
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
            'card_id' => ['nullable', 'numeric', 'exists:cards,id'],
            'card_number' => ['required_if:card_id,','regex:/^(\d{4}\-\d{4}\-\d{4}\-\d{4})$/'],
            'month' => ['required','date_format: m'],
            'year' => ['required', 'date_format: Y'],
            'cvv' => ['required', 'regex:/^\d{3}$/']
        ];
    }
}
