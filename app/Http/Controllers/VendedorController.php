<?php

namespace GerenciamentoVendas\Http\Controllers;

use Illuminate\Http\Request;
use GerenciamentoVendas\Models\Vendedor;
use GerenciamentoVendas\Models\Cidade;
use GerenciamentoVendas\Http\Requests\VendedoresRequest;

class VendedorController extends Controller
{
    /**
     * Exibir uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = Vendedor::paginate(10);
        return view('vendedor.index', ['vendedores' => $vendedores]);
    }

    /**
     * Mostrar o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::pluck('nome', 'id');
        return view('vendedor.create', ['vendedor' => new Vendedor(), 'cidades' => $cidades]);
    }

    /**
     * Armazene um recurso recém-criado no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedoresRequest $request)
    {
        /*$foto = $request->file('foto');
        $ext = ['jpg', 'png', 'jpeg'];
        if ($foto->isValid() and in_array($foto->extension(), $ext)) {
            $foto->storeAs('img', $foto->getClientOriginalName());
            $data = $request->all();
            $data['foto'] = $foto->getClientOriginalName();
            Vendedor::create($data);
        }*/
        
        Vendedor::create($request->all());
        return redirect()->action('VendedorController@index')->with('message', 'Vendedor cadastrado com sucesso');
    }

    /**
     * Exibir o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedor) //Route Model Binding Implicito
    {
        return view('vendedor.show')->with('vendedor', $vendedor);
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        $cidades = Cidade::pluck('nome', 'id');
        return view('vendedor.edit', compact('vendedor'), ['cidades' => $cidades]);
    }

    /**
     * Atualize o recurso especificado no Banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:vendedor,email,' . $vendedor->id,
            'endereco' => 'required|max:255',
            'cidade_id' => 'required|integer',
            'telefone' => 'required|min:10|max:14',
            'admissao' => 'required',
            'foto' => 'mimes:png,jpeg,jpg|max:4096',
            'documento_pessoal' => 'mimes:pdf,docx|max:4096',
        ]);

        $vendedor->update($request->all());
        return redirect()->action('VendedorController@index')->with('message', 'Vendedor atualizado com sucesso');
    }

    /**
     * Remova o recurso especificado do Banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->action('VendedorController@index')->with('message', 'Vendedor deletado com sucesso');
    }

    /**
     * Busca no banco de dados os caracteres digitados.
     */
    public function search(Request $request)
    {
        if (!empty($request->get('nome'))) {
            $vendedores = Vendedor::pesquisarNome($request->get('nome'));
            return view('vendedor.index', ['vendedores' => $vendedores]);
        } elseif (!empty($request->get('email'))) {
            $vendedores = Vendedores::pesquisarEmail($request->get('email'));
            return view('vendedor.index', ['vendedores' => $vendedores]);
        } else {
            $vendedores = Vendedor::paginate(10);
            return view('vendedor.index', ['vendedores' => $vendedores]);
        }
    }
}
