@extends('layouts.app')

@section('title', 'Detalhes do vendedor')

@section('content')
    <h2>Ver Vendedor</h2>
    <a href="{{action('VendedorController@edit', $vendedor->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('vendedor.destroy', $vendedor->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['vendedor.destroy', $vendedor->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $vendedor->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $vendedor->nome }}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{ $vendedor->email }}</td>
        </tr>
        <tr>
            <th scope="row">Endereço</th>
            <td>{{ $vendedor->endereco }}</td>
        </tr>
        <tr>
            <th scope="row">Cidade</th>
            <td>{{ $vendedor->cidade->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{ $vendedor->telefone_formatted }}</td>
        </tr>
        <tr>
            <th scope="row">Admissão</th>
            <td>{{ $vendedor->admissao_formatted }}</td>
        </tr>
        <tr>
            <th scope="row">Foto</th>
            <td><img class="img-vendedor" src="{{ url("img_vendedor/{$vendedor->foto}") }}" alt="{{ $vendedor->foto }}"></td>
        </tr>
        <tr>
            <th scope="row">Documento pessoal</th>
            <td><a href="{{ url('documento_pessoal/' . $vendedor->documento_pessoal) }}" target="_blank">{{ $vendedor->documento_pessoal }}</a></td>
        </tr>
        </tbody>
    </table>
@endsection