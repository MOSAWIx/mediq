<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $user = $this->user();

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
        ];

        // Ajout dynamique des champs selon le rôle
        if ($user->role === 'patient') {
            $rules['telephone'] = ['required', 'string', 'max:20'];
        }

        if ($user->role === 'medecin') {
            $rules['telephone'] = ['required', 'string', 'max:20'];
            $rules['adresse'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
