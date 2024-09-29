<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'fin' => 'required|string',
            'password' => 'required|string',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'fin.required' => 'FIN nömrəsini daxil etmək məcburidir.',
            'fin.string' => 'FIN nömrəsi doğru formatda olmalıdır.',
            'password.required' => 'Şifrə daxil etmək məcburidir.',
            'password.string' => 'Şifrə doğru formatda olmalıdır.',
        ];
    }
}
