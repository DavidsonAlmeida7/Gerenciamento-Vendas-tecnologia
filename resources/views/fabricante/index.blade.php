@extends('layouts.app')

@section('title', 'Fabricantes')

@section('content')

@if (empty($fabricantes))
    <h2>Fabricantes</h2>
    <a href="{{action('FabricanteController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar fabricante</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum fabricante cadastrado.</div>
@else
    <h2>Fabricantes</h2>
    <a href="{{action('FabricanteController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar fabricante</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th>Site</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('FabricanteController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th>
                <form action="{{action('FabricanteController@search')}}" method="GET">
                    <input class="form-control" type="search" name="site" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($fabricantes as $fab)
        <tr>
            <td>{{ $fab->id }}</td>
            <td>{{ $fab->nome }}</td>
            <td>{{ $fab->site }}</td>
            <td><a href="{{action('FabricanteController@show', $fab->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('FabricanteController@edit', $fab->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('fabricante.destroy', $fab->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $fabricantes->links() }}
    
@endif

@stop