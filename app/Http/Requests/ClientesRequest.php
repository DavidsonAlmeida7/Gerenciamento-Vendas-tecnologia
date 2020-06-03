<?php

namespace GerenciamentoVendas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use GerenciamentoVendas\Models\Cliente;
use Illuminate\Validation\Rule;

class ClientesRequest extends FormRequest
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
        //$cliente =  Cliente::first('id');
        //print_r($cliente);exit;
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:cliente,email',
            'endereco' => 'required|max:255',
            'cidade_id' => 'required|numeric',
            'telefone' => 'required|min:10|max:14',
			'cpf_cnpj' => 'required|unique:cliente,cpf_cnpj|min:11|max:18',
        ];
    }
}
