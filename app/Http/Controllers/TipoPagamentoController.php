<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\TipoPagamento;
use GerenciamentoVendas\Http\Requests\TipoPagamentosRequest;

class TipoPagamentoController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_pagamentos = TipoPagamento::paginate(10);
        return view('tipo_pagamento.index', ['tipo_pagamentos' => $tipo_pagamentos]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_pagamento.create', ['tipo_pagamento' => new TipoPagamento()]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoPagamentosRequest $request)
    {
        TipoPagamento::create($request->all());
        return redirect()->action('TipoPagamentoController@index')->with('message', 'Tipo de pagamento cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPagamento $tipo_pagamento) //Route Model Binding Implicito
    {
        return view('tipo_pagamento.show')->with('tipo_pagamento', $tipo_pagamento);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPagamento $tipo_pagamento)
    {
        return view('tipo_pagamento.edit', compact('tipo_pagamento'));
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoPagamentosRequest $request, TipoPagamento $tipo_pagamento)
    {
        $tipo_pagamento->update($request->all());
        return redirect()->action('TipoPagamentoController@index')->with('message', 'Tipo de pagamento atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPagamento $tipo_pagamento)
    {
        $tipo_pagamento->delete();
        return redirect()->action('TipoPagamentoController@index')->with('message', 'Tipo de pagamento deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $tipo_pagamentos = TipoPagamento::pesquisarTipo($request->get('tipo'));
            return view('tipo_pagamento.index', ['tipo_pagamentos' => $tipo_pagamentos]);
        } else {
            $tipo_pagamentos = TipoPagamento::paginate(10);
            return view('tipo_pagamento.index', ['tipo_pagamentos' => $tipo_pagamentos]);
        }
    }
}
