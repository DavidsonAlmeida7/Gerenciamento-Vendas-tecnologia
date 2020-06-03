@extends('layouts.app')

@section('title', 'Modelos')

@section('content')

@if (empty($modelos))
    <h2>Modelos</h2>
    <a href="{{action('ModeloController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar modelo</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum modelo cadastrado.</div>
@else
    <h2>Modelos</h2>
    <a href="{{action('ModeloController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar modelo</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('ModeloController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($modelos as $m)
        <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->nome }}</td>
            <td><a href="{{action('ModeloController@show', $m->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('ModeloController@edit', $m->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('modelo.destroy', $m->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $modelos->links() }}
    
@endif

@stop