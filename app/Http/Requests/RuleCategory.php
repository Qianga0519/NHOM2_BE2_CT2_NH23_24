<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleCategory extends FormRequest
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
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required' => "Name is not empty.",
    //         'name.min' => "Name least 3 characters.",
    //         'name.max' => "Name maximum 30 characters.",
    //         'slug.required' => "Slug is not empty.",
    //         'slug.min' => "Slug least 3 characters.",
    //         'slug.max' => "Slug maximum 30 characters.",
    //     ];
    // }
}
