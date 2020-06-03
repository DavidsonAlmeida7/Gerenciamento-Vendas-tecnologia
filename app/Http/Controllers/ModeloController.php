<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Modelo;
use GerenciamentoVendas\Http\Requests\ModelosRequest;

class ModeloController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelo::paginate(10);
        return view('modelo.index', ['modelos' => $modelos]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modelo.create', ['modelo' => new Modelo()]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelosRequest $request)
    {
        Modelo::create($request->all());
        return redirect()->action('ModeloController@index')->with('message', 'Modelo cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo) //Route Model Binding Implicito
    {
        return view('modelo.show')->with('modelo', $modelo);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        return view('modelo.edit', compact('modelo'));
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModelosRequest $request, Modelo $modelo)
    {
        $modelo->update($request->all());
        return redirect()->action('ModeloController@index')->with('message', 'Modelo atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return redirect()->action('ModeloController@index')->with('message', 'Modelo deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $modelos = Modelo::pesquisarNome($request->get('nome'));
            return view('modelo.index', ['modelos' => $modelos]);
        } else {
            $modelos = Modelo::paginate(10);
            return view('modelo.index', ['modelos' => $modelos]);
        }
    }
}
