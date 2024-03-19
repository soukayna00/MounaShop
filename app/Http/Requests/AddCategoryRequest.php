<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cat_name'=>'required|min:3',
            'cat_image' => 'image|mimes:jpeg,png,jpg|max:2048',

        ];
    }
    public function messages(){
        return [
            'cat_name.required'=>'category name is required',
            'cat_name.min'=>'category name must at least have 3 characters',
            'cat_image.image' => 'The file must be an image',
            'cat_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'cat_image.max' => 'The image may not be greater than 2MB'
        ];
    }
}
