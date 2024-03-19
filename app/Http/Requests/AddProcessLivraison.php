<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProcessLivraison extends FormRequest
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
            'shipping_address' => 'required',
            'shipping_city' => 'required|string',
            'shipping_postal_code' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'shipping_address.required'=>'shipping_address is required',
            'shipping_city.required'=>'shipping city is required',
            'shipping_postal_code.required'=>'shipping postal code is required',
            'name.required'=>'name is required',
            'email.required'=>'email is required',
            'phone_number.required'=>'phone number is required',
            'shipping_city.string'=>'shipping city doit etre charactere',
            'name.string'=>'name doit etre charactere',
            'email.string'=>"email  doit avoir le format d'email",
            'phone_number.numeric'=>'phone_number doit etre numeriques',





        ];
    }
}
