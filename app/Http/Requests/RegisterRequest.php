<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required|in:male,female',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле email обязательно для заполнения',
            'email.string' => 'Поле email должно содержать адрес электронной почты',
            'email.unique' => 'Этот email уже используется',
            'password.required' => 'Поле password обязательно для заполнения',
            'password.min' => 'Поле password должно содержать минимум 8 символов',
            'gender.required' => 'Поле gender обязательно для заполнения',
            'gender.in' => 'Пол должен быть: male или female',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
