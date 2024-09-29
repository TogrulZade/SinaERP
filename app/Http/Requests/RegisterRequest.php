<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'father_name' => 'required|string|min:3',
            'fin' => 'required|string|size:7|unique:users,fin',
            'serie' => 'required|string',
            'id_number' => 'required|digits:8',
            'phone' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad sahəsi boş buraxıla bilməz.',
            'name.string' => 'Ad sahəsi yalnız mətn olmalıdır.',
            'name.min' => 'Ad sahəsi ən azı 3 simvoldan ibarət olmalıdır.',

            'surname.required' => 'Soyad sahəsi boş buraxıla bilməz.',
            'surname.string' => 'Soyad sahəsi yalnız mətn olmalıdır.',
            'surname.min' => 'Soyad sahəsi ən azı 3 simvoldan ibarət olmalıdır.',

            'father_name.required' => 'Ata adı sahəsi boş buraxıla bilməz.',
            'father_name.string' => 'Ata adı yalnız mətn olmalıdır.',
            'father_name.min' => 'Ata adı ən azı 3 simvoldan ibarət olmalıdır.',

            'fin.required' => 'FIN sahəsi boş buraxıla bilməz.',
            'fin.string' => 'FIN sahəsi yalnız mətn olmalıdır.',
            'fin.size' => 'FIN dəqiq olaraq 7 simvoldan ibarət olmalıdır.',

            'serie.required' => 'Seriya sahəsi boş buraxıla bilməz.',
            'serie.string' => 'Seriya sahəsi yalnız mətn olmalıdır.',

            'id_number.required' => 'ID nömrəsi sahəsi boş buraxıla bilməz.',
            'id_number.digits' => 'ID nömrəsi dəqiq olaraq 8 rəqəmdən ibarət olmalıdır.',

            'phone.required' => 'Telefon nömrəsi sahəsi boş buraxıla bilməz.',
            'phone.string' => 'Telefon nömrəsi yalnız mətn formatında olmalıdır.',

            'email.required' => 'Email sahəsi boş buraxıla bilməz.',
            'email.email' => 'Daxil edilən email düzgün formatda deyil.',

            'password.required' => 'Şifrə sahəsi boş buraxıla bilməz.',
            'password.string' => 'Şifrə sahəsi yalnız mətn olmalıdır.',
            'password.min' => 'Şifrə ən azı 4 simvoldan ibarət olmalıdır.',
        ];
    }
}
