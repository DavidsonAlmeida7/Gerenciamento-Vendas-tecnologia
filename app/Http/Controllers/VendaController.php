<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Venda;
use GerenciamentoVendas\Models\Cliente;
use GerenciamentoVendas\Models\Produto;
use GerenciamentoVendas\Models\TipoPagamento;
use GerenciamentoVendas\Models\Vendedor;
use GerenciamentoVendas\Http\Requests\VendasRequest;
use DataTables;

class VendaController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::paginate(20);
        $vendedores = Vendedor::all();
        return view('venda.index', ['vendas' => $vendas, 'vendedores' => $vendedores]);
    }

    /**
     * Método Gera PDF.
     */
    public function pdf()
    {
        $vendas = Venda::all();
        $vendedores = Vendedor::all();
        $pdf = \PDF::loadView('venda.pdf', ['vendas' => $vendas, 'vendedores' => $vendedores])->setPaper('a4', 'landscape');
        return $pdf->stream('teste.pdf'); //mostra conteudo
    }

    /**
     * Teste datatables...
     */
    public function index2()
    {  
        if (Request()->ajax()) {
            $vendas = Venda::all();
            return Datatables::collection($vendas)->make(true);
        }
        return view('venda.index2');
    }

    /**
     * Exibir o grafico de Produtos.
     */
    public function graficoProduto()
    {
        $vendas = Venda::all();

        foreach ($vendas as $dado) {
            $nomes[] = $dado->produto->nome;
            $nome = array_count_values($nomes); //Conta todos os valores de um array.
            $indice = array_keys($nome);  //retorna indice.
            $valor = array_values($nome); //retorna os valores.
        }

        $produtos = $nome;

        return view('venda.grafico_produto', ['produtos' => $produtos]);
    }

    /**
     * Exibir o grafico de Fabricante.
     */
    public function graficoFabricante()
    {
        $vendas = Venda::all();

        foreach ($vendas as $dado) {
            $nomes[] = $dado->produto->fabricante->nome;
            $nome = array_count_values($nomes);
        }

        $fabricantes = $nome;

        return view('venda.grafico_fabricante', ['fabricantes' => $fabricantes]);
    }

    /**
     * Exibir o grafico de Vendedor.
     */
    public function graficoVendedor()
    {
        $vendas = Venda::all();

        foreach ($vendas as $dado) {
            $nomes[] = $dado->vendedor->nome;
            $nome = array_count_values($nomes);
        }

        $vendedores = $nome;
        
        return view('venda.grafico_vendedor', ['vendedores' => $vendedores]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::pluck('nome', 'id');
        $vendedores = Vendedor::pluck('nome', 'id');
        $produtos = Produto::all();
        $tipo_pagamentos = TipoPagamento::all();

        return view('venda.create', [
            'venda' => new Venda(), 
            'clientes' => $clientes,
            'vendedores' => $vendedores,
            'produtos' => $produtos,
            'tipo_pagamentos' => $tipo_pagamentos,
        ]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendasRequest $request)
    {   
        if (Venda::create($request->all())) {
            $venda = Venda::orderBy('id', 'DESC')->first();
            $produto = $venda->produto->quantidade_estoque - 1;
            $produto_atualizar = Produto::where('id', $venda->produto_id)->first();
            $produto_atualizar->update(['quantidade_estoque' => $produto]);
            
            return redirect()->action('VendaController@index')->with('message', 'Venda cadastrada com sucesso');
        } else {
            return redirect()->action('VendaController@create')->with('message', 'Ocorreu um erro');
        }
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda) //Route Model Binding Implicito
    {
        return view('venda.show')->with('venda', $venda);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        $clientes = Cliente::pluck('nome', 'id');
        $vendedores = Vendedor::pluck('nome', 'id');
        $produtos = Produto::pluck('nome', 'id');
        $tipo_pagamentos = TipoPagamento::pluck('tipo', 'id');

        return view('venda.edit', compact('venda'), [
            'clientes' => $clientes,
            'vendedores' => $vendedores,
            'produtos' => $produtos,
            'tipo_pagamentos' => $tipo_pagamentos,
        ]);
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendasRequest $request, Venda $venda)
    {
        $venda->update($request->all());
        return redirect()->action('VendaController@index')->with('message', 'Venda atualizada com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->action('VendaController@index')->with('message', 'Venda deletada com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('cliente_id'))) {
            $vendas = Venda::pesquisarCliente($request->get('cliente_id'));
            return view('venda.index', ['vendas' => $vendas]);
        } elseif (!empty($request->get('vendedor_id'))) {
            $vendas = Venda::pesquisarVendedor($request->get('vendedor_id'));
            return view('venda.index', ['vendas' => $vendas]);
        } elseif (!empty($request->get('produto_id'))) {
            $vendas = Venda::pesquisarProduto($request->get('produto_id'));
            return view('venda.index', ['vendas' => $vendas]);
        } else {
            $vendas = Venda::paginate(10);
            return view('venda.index', ['vendas' => $vendas]);
        }
    }
}
