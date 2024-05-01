<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleProduct extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'price' => 'required|numeric|gte:0',
            'qty' => 'required|numeric|gt:0',
            'sale_amount' => 'required|numeric|gte:0',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'color_id' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
