<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //método diz se será sempre executado essa validaçõa (padrao false)
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
            'nome' => 'required|min:3',
            'descricao' => 'required|max:255',
            'tamanho' => 'required|max:100',
            'valor' => 'required|numeric',
            'quantidade' => 'required|numeric'
            
        ];
    }

    public function messages()
    {
        //customisar mensagens de validação
        return[
            'nome.required' => '0 nome é obrigatório!'
        ];
    }
}
