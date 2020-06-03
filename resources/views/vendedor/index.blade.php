@extends('layouts.app')

@section('title', 'Vendedores')

@section('content')

@if (empty($vendedores))
    <h2>Vendedores</h2>
    <a href="{{action('VendedorController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar vendedor</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum vendedor cadastrado.</div>
@else
    <h2>Vendedores</h2>
    <a href="{{action('VendedorController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar vendedor</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th>email</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('VendedorController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th>
                <form action="{{action('VendedorController@search')}}" method="GET">
                    <input class="form-control" type="search" name="email" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($vendedores as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->nome }}</td>
            <td>{{ $v->email }}</td>
            <td><a href="{{action('VendedorController@show', $v->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('VendedorController@edit', $v->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('vendedor.destroy', $v->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $vendedores->links() }}
    
@endif

@stop