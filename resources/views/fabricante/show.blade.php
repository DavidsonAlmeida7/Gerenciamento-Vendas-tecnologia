@extends('layouts.app')

@section('title', 'Detalhes do fabricante')

@section('content')
    <h2>Ver Fabricante</h2>
    <a href="{{action('FabricanteController@edit', $fabricante->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('fabricante.destroy', $fabricante->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['fabricante.destroy', $fabricante->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $fabricante->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $fabricante->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Site</th>
            <td>{{ $fabricante->site }}</td>
        </tr>
        </tbody>
    </table>
@endsection