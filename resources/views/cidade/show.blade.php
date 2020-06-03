@extends('layouts.app')

@section('title', 'Detalhes da cidade')

@section('content')
    <h2>Ver Cidade</h2>
    <a href="{{action('CidadeController@edit', $cidade->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('cidade.destroy', $cidade->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['cidade.destroy', $cidade->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $cidade->id }}</td>
        </tr>
        <tr>
            <th scope="row">Bebida</th>
            <td>{{ $cidade->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Valor</th>
            <td>{{ $cidade->estado }}</td>
        </tr>
        </tbody>
    </table>
@endsection