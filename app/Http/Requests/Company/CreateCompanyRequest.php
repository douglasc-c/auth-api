<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'tag' => ['required', 'string', 'max:255', 'unique:companies,tag'],
            'social_reason' => ['required', 'string', 'max:255', 'unique:companies,social_reason'],
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
            'name.required' => 'O nome é obrigatório',
            'tag.unique' => 'Esta sigla já está em uso',
            'tag.required' => 'Sigla é obrigatória',
            'social_reason.unique' => 'Esta razão social já está em uso',
            'social_reason.required' => 'Razão social é obrigatória',
        ];
    }

}
