<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetail extends FormRequest
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
            'product_id' => ['required', 'numeric', 'exists:products,id'],
            'color_id' => ['nullable'],
            'color' => 'nullable|string',
            'count' => 'required|numeric',
            'image' => 'required|file'
        ];
    }
}
