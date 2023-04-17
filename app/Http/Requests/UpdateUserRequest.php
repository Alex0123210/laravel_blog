<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'email'=>'required|min:6|max:550|email|unique:users,email',
            'password'=>'required|min:10|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute не передано',
            'unique:users,email'=>'Пользователь с таким email уже существует',
        ];
    }


}
