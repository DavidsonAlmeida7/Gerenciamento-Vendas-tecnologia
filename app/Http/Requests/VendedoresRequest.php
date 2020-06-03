<?php

namespace GerenciamentoVendas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedoresRequest extends FormRequest
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
            'email' => 'required|email|unique:vendedor,email',
            'endereco' => 'required|max:255',
            'cidade_id' => 'required|integer',
            'telefone' => 'required|min:10|max:14',
            'admissao' => 'required',
            'foto' => 'mimes:png,jpeg,jpg|max:4096',
            'documento_pessoal' => 'required|mimes:pdf,docx|max:4096',
        ];
    }
}
