@extends('layouts.app')

@section('title', 'Detalhes do cliente')

@section('content')
    <h2>Ver Cliente</h2>
    <a href="{{action('ClienteController@edit', $cliente->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('cliente.destroy', $cliente->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['cliente.destroy', $cliente->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $cliente->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $cliente->nome }}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{ $cliente->email }}</td>
        </tr>
        <tr>
            <th scope="row">Endereço</th>
            <td>{{ $cliente->endereco }}</td>
        </tr>
        <tr>
            <th scope="row">Cidade</th>
            <td>{{ $cliente->cidade->nome }}</td>
        </tr>
        <tr>
            <th scope="row">telefone</th>
            <td>{{ $cliente->telefone_formatted }}</td>
        </tr>
        <tr>
            <th scope="row">CPF/CNPJ</th>
            <td>{{ $cliente->cpf_cnpj_formatted }}</td>
        </tr>
        </tbody>
    </table>
@endsection