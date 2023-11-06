<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|min:2",
        ];
    }
    public function messages(){
        return [
            'name.max' => 'Devi inserire una categoria di massimo 255 caratteri',
            'name.min' => 'Devi inserire una categoria di minimo 2 caratteri',
            'name.required' => 'Devi inserire la categoria',
        ];
    }
}
