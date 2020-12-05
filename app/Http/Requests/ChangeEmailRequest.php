<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
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
            'email' => 'required|email|max:100',
            'pwd' => 'required|min:6|max:32'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Электронная почта должна быть указана',
            'email.email' => 'Неверный формат электронной почты',
            'email.max' => 'Электронная почта длиннее 100 символов',
            'pwd.required' => 'Пароль должен быть указан',
            'pwd.min' => 'Пароль короче 6 символов',
            'pwd.max' => 'Пароль длиннее 32 символов'
        ];
    }
}
