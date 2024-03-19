<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProcessPaiment extends FormRequest
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
            'NumCarte' => 'required|numeric',
            'DateExp' => ['required','regex:/^(0[1-9]|1[0-2])\/[0-9]{4}$/'],

            'password' => ['required','min:8', 'regex:/^(?=.*[a-zA-Z0-9])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/']
        ];
    }
    public function messages(){
        return [
            'NumCarte.required' => 'Le numéro de carte est nécessaire.',
            'DateExp.required' => "La date d'expiration est nécessaire.",
            'password.required' => 'Le mot de passe est nécessaire.',
            'NumCarte.numeric' => 'Le numéro de carte doit contenir uniquement des chiffres.',
            'DateExp.regex' => 'La date doit respecter le format MM/AAAA.',
            'password.min' => 'Le mot de passe doit contenir au moins huit caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins deux caractères spéciaux et un chiffre.',
        ];
    }
}
