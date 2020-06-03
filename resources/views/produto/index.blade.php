@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

@if (empty($produtos))
    <h2>Produtos</h2>
    <a href="{{action('ProdutoController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar produto</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
@else
    <h2>Produtos</h2>
    <a href="{{action('ProdutoController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar produto</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Nome</th>
            <th>Modelo</th>
            <th>Fabricante</th>
            <th style="width:15%;">Quantidade em estoque</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('ProdutoController@search')}}" method="GET">
                    <input class="form-control" type="search" name="nome" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($produtos as $p)
        <tr class="{{$p->quantidade_estoque <= 3 ? 'bg-danger' : '' }}">
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->modelo->nome }}</td>
            <td>{{ $p->fabricante->nome }}</td>
            <td>{{ $p->quantidade_estoque }}</td>
            <td><a href="{{action('ProdutoController@show', $p->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('ProdutoController@edit', $p->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('produto.destroy', $p->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    <h4 align="right"><span class="badge badge-danger">Três ou menos itens no estoque</span></h4>
    
    {{ $produtos->links() }}
    
@endif

@stop