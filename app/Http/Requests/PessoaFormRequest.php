<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFormRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'nascimento' => 'required|date_format:Y-m-d|before:now',
            'pais_id' => 'required|exists:pais,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Campo nome é obrigatório!',
            'nascimento.date_format' => 'Formato de date não é válido: dia/mes/ano!',
            'nascimento.required' => 'Campo data de nascimento é obrigatório!',
            'nascimento.before' => 'Você não pode nascer depois de hoje!',
            'pais_id.required' => 'Selecione seu país!',
        ];
    }
}
