<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Produto;
use GerenciamentoVendas\Models\Fabricante;
use GerenciamentoVendas\Models\Modelo;
use GerenciamentoVendas\Http\Requests\ProdutosRequest;
use Picqer;

class ProdutoController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('modelo_id', 'DESC')->paginate(10);
        return view('produto.index', ['produtos' => $produtos]);
    }

    public function index2()
    {
        $produtos = Produto::orderBy('modelo_id', 'DESC')->paginate(10);
        return view('produto.index2', ['produtos' => $produtos]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabricantes = Fabricante::orderBy('nome', 'ASC')->pluck('nome', 'id');
        $modelos = Modelo::orderBy('nome', 'ASC')->pluck('nome', 'id');
        return view('produto.create', ['produto' => new Produto(), 'fabricantes' => $fabricantes, 'modelos' => $modelos]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosRequest $request, Produto $produto)
    {
        $produto->fill($request->all())->save(); //fill()... Apenas preenche as informações do model.
        $produto->codigo_barra = $produto->id;
        $produto->qrcode = date('Y-m-d');
        $produto->save();

        return redirect()->action('ProdutoController@index')->with('message', 'Produto cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto) //Route Model Binding Implicito
    {
        $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $barcode = $barcode_generator->getBarcode($produto->id, $barcode_generator::TYPE_CODE_128, 5, 70);

        return view('produto.show', ['produto' => $produto, 'barcode' => $barcode]);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $modelos = Modelo::pluck('nome', 'id');
        $fabricantes = Fabricante::pluck('nome', 'id');
        return view('produto.edit', compact('produto'), ['modelos' => $modelos, 'fabricantes' => $fabricantes]);
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutosRequest $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->action('ProdutoController@index')->with('message', 'Produto atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->action('ProdutoController@index')->with('message', 'Produto deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $produtos = Produto::pesquisarNome($request->get('nome'));
            return view('produto.index', ['produtos' => $produtos]);
        } elseif (!empty($request->get('fabricante_id'))) {
            $produtos = Produto::pesquisarFabricante($request->get('fabricante_id'));
            return view('produto.index', ['produtos' => $produtos]);
        } else {
            $produtos = Produto::paginate(10);
            return view('produto.index', ['produtos' => $produtos]);
        }
    }
}
