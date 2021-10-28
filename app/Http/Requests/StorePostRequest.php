<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:25',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O :attribute deve conter no máximo :max caracteres.',
            'content.required' => 'Você esqueceu de preencher o :attribute.'
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
