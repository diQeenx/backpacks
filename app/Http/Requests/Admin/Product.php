<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'brand_id' => ['required', 'numeric', 'exists:brands,id'],
            'type_id' => ['nullable'],
            'type' => 'nullable',
            'name' => 'required|string|max:50',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ];
    }
}
