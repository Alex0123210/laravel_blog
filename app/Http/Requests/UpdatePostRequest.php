<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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

//    protected function prepareForValidation()
//    {
////        $this->merge([
////           'id' => $this->route('id')
////        ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'id' => 'required|int',
            'title' => 'required|string|min:3|max:100',
            'text' => 'required|min:3|max:550',
            'img' => 'mimes:jpeg,jpg,png|max:5000', //laravel автоматически поймет, что величина в кБ. Делаем ограничения по форматам файла

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
