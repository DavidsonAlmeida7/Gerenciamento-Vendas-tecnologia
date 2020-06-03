@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@if (empty($clientes))
    <h2>Clientes</h2>
    <a href="{{action('ClienteController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar cliente</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum cliente cadastrado.</div>
@else
    <h2>Clientes</h2>
    <a href="{{action('ClienteController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar cliente</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF/CNPJ</th>
            <th>Telefone</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('ClienteController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th>
                <form action="{{action('ClienteController@search')}}" method="GET">
                    <input class="form-control" type="search" name="email" placeholder="Pesquisar">
                </form>
            </th>
            <th>
                <form action="{{action('ClienteController@search')}}" method="GET">
                    <input class="form-control" type="search" name="cpf_cnpj" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($clientes as $cli)
        <tr>
            <td>{{ $cli->id }}</td>
            <td>{{ $cli->nome }}</td>
            <td>{{ $cli->email }}</td>
            <td>{{ $cli->cpf_cnpj_formatted }}</td>
            <td>{{ $cli->telefone_formatted }}</td>
            <td><a href="{{action('ClienteController@show', $cli->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('ClienteController@edit', $cli->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('cliente.destroy', $cli->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $clientes->links() }}
    
@endif

@stop