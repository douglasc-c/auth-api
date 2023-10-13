<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string|max:255',
            'type' => 'string|max:255',
            'document' => 'string|max:255|unique:users,document',
            'social_reason' => 'string|max:255|unique:users,social_reason',
            'company' => 'string|exists:companies,code',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'document.unique' => 'Este documento já está em uso.',
            'social_reason.unique' => 'Esta razão social já está em uso.',
            'company.exists' => 'A empresa selecionada não é válida.',
        ];
    }
}
