<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddArticleRequest extends FormRequest
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
            'Product_name'=>'required|min:5',
            'Description'=>'required|max:200|min:4',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'Product_name.required'=>'product name is required',
            'Product_name.min'=>'too short',
            'Description.min'=>'too short',
            'Description.max'=>'too long',
            'Description.required'=>'product name is required',
            'price.required'=>'price is required',
            'price.numeric' => 'Price must be a number',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',



        ];
    }
}
