@extends('layouts.app')

@section('title', 'Cidades')

@section('content')

@if (empty($cidades))
    <h2>Cidades</h2>
    <a href="{{action('CidadeController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar cidade</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhuma cidade cadastrada.</div>
@else
    <h2>Cidades</h2>
    <a href="{{action('CidadeController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar cidade</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th>Estado</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('CidadeController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th>
                <form action="{{action('CidadeController@search')}}" method="GET">
                    <input class="form-control" type="search" name="estado" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($cidades as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>{{ $c->estado }}</td>
            <td><a href="{{action('CidadeController@show', $c->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('CidadeController@edit', $c->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('cidade.destroy', $c->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $cidades->links() }}
    
@endif

@stop