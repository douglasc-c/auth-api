<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255', 'unique:users,document'],
            'social_reason' => ['required', 'string', 'max:255', 'unique:users,social_reason'],
            'company' => ['required', 'exists:companies,code'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'type.required' => 'O tipo de conta é obrigatório',
            'document.unique' => 'Este documento já está em uso',
            'document.required' => 'Documento é obrigatório',
            'social_reason.unique' => 'Esta razão social já está em uso',
            'social_reason.required' => 'Razão social é obrigatória',
            'company.required' => 'A empresa é obrigatória',
            'company.exists' => 'A empresa selecionada não foi encontrada na tabela de empresas',
        ];
    }
}
