<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:25', Rule::unique('posts_seminario', 'title')->ignore($this->id)],
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O :attribute deve conter no máximo :max caracteres.',
            'content.required' => 'Você esqueceu de preencher o :attribute.',
            'unique' => 'Já existe um post cadastrado com esse título'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título do post',
            'content' => 'conteúdo do post',
            'image' => 'imagem',
        ];
    }
}
