<?php

namespace GerenciamentoVendas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendasRequest extends FormRequest
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
            'cliente_id' => 'required|integer',
            'vendedor_id' => 'required|integer',
            'produto_id' => 'required|integer',
            'tipo_pagamento_id' => 'required|integer',
            'endereco' => 'max:255',
            'data_emissao' => 'date',
            'descricao' => 'required',
            'frete' => 'between:0,99.99',
            'valor_total' => 'between:0,99.99',
        ];
    }
}
