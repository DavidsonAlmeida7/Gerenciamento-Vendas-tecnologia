<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Cidade;
use GerenciamentoVendas\Models\Cliente;
use GerenciamentoVendas\Http\Requests\CidadesRequest;

class CidadeController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::paginate(10);
        return view('cidade.index', ['cidades' => $cidades]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cidade.create', ['cidade' => new Cidade()]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadesRequest $request)
    {
        Cidade::create($request->all());
        return redirect()->action('CidadeController@index')->with('message', 'Cidade cadastrada com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade) //Route Model Binding Implicito
    {
        return view('cidade.show')->with('cidade', $cidade);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        return view('cidade.edit', compact('cidade'));
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadesRequest $request, Cidade $cidade)
    {
        $cidade->update($request->all());
        return redirect()->action('CidadeController@index')->with('message', 'Cidade atualizada com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if (Cliente::comparaCidade($cidade->id)) {
            return redirect()->action('CidadeController@index')->with('message', 'Cidade em uso');
        } else {
            $cidade->delete();
            return redirect()->action('CidadeController@index')->with('message', 'Cidade deletada com sucesso');
        }
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $cidades = Cidade::pesquisarNome($request->get('nome'));
            return view('cidade.index', ['cidades' => $cidades]);
        } elseif (!empty($request->get('estado'))) {
            $cidades = Cidade::pesquisarEstado($request->get('estado'));
            return view('cidade.index', ['cidades' => $cidades]);
        } else {
            $cidades = Cidade::paginate(10);
            return view('cidade.index', ['cidades' => $cidades]);
        }
    }
}
