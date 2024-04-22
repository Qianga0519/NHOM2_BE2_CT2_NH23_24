<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleManufature extends FormRequest
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
            // 'name' => 'required|min:3|unique:categories|max:30',
            'name' => 'required|min:3|max:30',
            'slug' => 'required|min:3|max:30',
            'country' => 'required|min:3|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
