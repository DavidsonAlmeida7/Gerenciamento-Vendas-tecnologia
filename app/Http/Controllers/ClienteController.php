<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Cliente;
use GerenciamentoVendas\Models\Cidade;
use GerenciamentoVendas\Http\Requests\ClientesRequest;

class ClienteController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nome', 'ASC')->paginate(10);
        return view('cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::orderBy('nome', 'ASC')->pluck('nome', 'id');
        return view('cliente.create', ['cliente' => new Cliente(), 'cidades' => $cidades]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->action('ClienteController@index')->with('message', 'Cliente cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) //Route Model Binding Implicito
    {
        return view('cliente.show')->with('cliente', $cliente);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $cidades = Cidade::pluck('nome', 'id');
        return view('cliente.edit', compact('cliente'), ['cidades' => $cidades]);
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:cliente,email,' . $cliente->id,
            'endereco' => 'required|max:255',
            'cidade_id' => 'required|numeric',
            'telefone' => 'required|min:10|max:14',
			'cpf_cnpj' => 'required|unique:cliente,cpf_cnpj,' . $cliente->id . '|min:11|max:18',
        ]);

        $cliente->update($request->all());
        return redirect()->action('ClienteController@index')->with('message', 'Cliente atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->action('ClienteController@index')->with('message', 'Cliente deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $clientes = Cliente::pesquisarNome($request->get('nome'));
            return view('cliente.index', ['clientes' => $clientes]);
        } elseif (!empty($request->get('email'))) {
            $clientes = Cliente::pesquisarEmail($request->get('email'));
            return view('cliente.index', ['clientes' => $clientes]);
        } elseif (!empty($request->get('cpf_cnpj'))) {
            $clientes = Cliente::pesquisarCpfCnpj($request->get('cpf_cnpj'));
            return view('cliente.index', ['clientes' => $clientes]);
        } else {
            $clientes = Cliente::paginate(10);
            return view('cliente.index', ['clientes' => $clientes]);
        }
    }
}
