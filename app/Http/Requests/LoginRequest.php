<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|min:4|max:30',
            'password' => 'required|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Логин является обязательным',
            'login.min' => 'Логин короче 4 символов',
            'login.max' => 'Логин длиннее 30 символов',
            'password.required' => 'Пароль является обязательным',
            'password.min' => 'Пароль короче 6 символов',
            'password.max' => 'Пароль длиннее 32 символов',
        ];
    }
}
