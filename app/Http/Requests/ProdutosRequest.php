<?php

namespace GerenciamentoVendas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
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
            'modelo_id' => 'required|numeric',
            'fabricante_id' => 'required|numeric',
            'descricao' => 'required',
            'quantidade_estoque' => 'required|integer',
            'preco' => 'required|between:0,99.99',
            'foto' => 'mimes:png,jpeg,jpg|max:4096',
        ];
    }
}
