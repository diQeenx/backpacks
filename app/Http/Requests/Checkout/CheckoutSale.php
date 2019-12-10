<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutSale extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address_radio' => 'required',
            'country_id' => ['nullable', 'required_if:address_radio,new', 'exists:countries,id'],
            'city' => ['nullable', 'required_if:address_radio,new', 'string'],
            'address' => ['nullable', 'required_if:address_radio,new', 'string'],
            'zip_code' => ['nullable', 'required_if:address_radio,new', 'regex:/^\d{6}$/']
        ];
    }
}
