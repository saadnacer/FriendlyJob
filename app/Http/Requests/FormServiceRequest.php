<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ajout du dossier et fichier request pour les messages d'erreur 
// pour l'inscription du service


class FormServiceRequest extends FormRequest
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
            'libelle' => ['required', 'min:4', 'regex:/^[^\d]+$/'],
            'prix' => ['required', 'min:1'],
            'description' => ['required', 'min:4', 'regex:/^[^\d]+$/'],
            'photo' => ['required', 'image', 'max:2048'],

        ];
    }
}
