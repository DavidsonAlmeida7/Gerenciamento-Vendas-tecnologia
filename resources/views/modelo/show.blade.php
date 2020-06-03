@extends('layouts.app')

@section('title', 'Detalhes do modelo')

@section('content')
    <h2>Ver Modelo</h2>
    <a href="{{action('ModeloController@edit', $modelo->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('modelo.destroy', $modelo->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['modelo.destroy', $modelo->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $modelo->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $modelo->nome }}</td>
        </tr>
        </tbody>
    </table>
@endsection