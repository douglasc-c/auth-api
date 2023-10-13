<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'tag' => 'string|max:255|unique:companies,tag',
            'social_reason' => 'string|max:255|unique:companies,social_reason',
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
            'tag.unique' => 'Esta tag já está em uso.',
            'social_reason.unique' => 'Esta razão social já está em uso.',
        ];
    }
}
