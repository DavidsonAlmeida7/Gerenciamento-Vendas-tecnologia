<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Fabricante;
use GerenciamentoVendas\Http\Requests\FabricantesRequest;

class FabricanteController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = Fabricante::paginate(10);
        return view('fabricante.index', ['fabricantes' => $fabricantes]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricante.create', ['fabricante' => new Fabricante()]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FabricantesRequest $request)
    {
        Fabricante::create($request->all());
        return redirect()->action('FabricanteController@index')->with('message', 'Fabricante cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante) //Route Model Binding Implicito
    {
        return view('fabricante.show')->with('fabricante', $fabricante);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        return view('fabricante.edit', compact('fabricante'));
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FabricantesRequest $request, Fabricante $fabricante)
    {
        $fabricante->update($request->all());
        return redirect()->action('FabricanteController@index')->with('message', 'Fabricante atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();
        return redirect()->action('FabricanteController@index')->with('message', 'Fabricante deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $fabricantes = Fabricante::pesquisarNome($request->get('nome'));
            return view('fabricante.index', ['fabricantes' => $fabricantes]);
        } elseif (!empty($request->get('site'))) {
            $fabricantes = Fabricante::pesquisarSite($request->get('site'));
            return view('fabricante.index', ['fabricantes' => $fabricantes]);
        } else {
            $fabricantes = Fabricante::paginate(10);
            return view('fabricante.index', ['fabricantes' => $fabricantes]);
        }
    }
}
