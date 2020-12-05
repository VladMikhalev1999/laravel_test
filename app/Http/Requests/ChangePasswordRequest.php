<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'login' => 'required',
            'oldpwd' => 'required|min:6|max:32',
            'newpwd' => 'required|min:6|max:32|different:oldpwd'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Логин является обязательным',
            'oldpwd.required' => 'Старый пароль является обязательным',
            'oldpwd.min' => 'Старый пароль короче 6 символов',
            'oldpwd.max' => 'Старый пароль длиннее 32 символов',
            'newpwd.required' => 'Новый пароль является обязательным',
            'newpwd.min' => 'Новый пароль короче 6 символов',
            'newpwd.max' => 'Новый пароль длиннее 32 символов',
            'newpwd.different' => 'Пароли не должны совпадать'
        ];
    }
}
