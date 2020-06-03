@extends('layouts.app')

@section('title', 'Tipo de Pagamentos')

@section('content')

@if (empty($tipo_pagamentos))
    <h2>Tipo de Pagamentos</h2>
    <a href="{{action('TipoPagamentoController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar tipo de pagamento</a>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum tipo de pagamento cadastrado.</div>
@else
    <h2>Tipo de Pagamentos</h2>
    <a href="{{action('TipoPagamentoController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar tipo de pagamento</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr class="header">
            <th>ID</th>
            <th>Tipo</th>
            <th>Taxa</th>
            <th style="width:7%;">Ver</th>
            <th style="width:7%;">Atualizar</th>
            <th style="width:7%;">Apagar</th>
        </tr>
        <tr>
            <th>
            </th>
            <th>
                <form action="{{action('TipoPagamentoController@search')}}" method="GET">
                    <input class="form-control" type="search" name="tipo" placeholder="Pesquisar">
                </form>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($tipo_pagamentos as $tp)
        <tr>
            <td>{{ $tp->id }}</td>
            <td>{{ $tp->tipo }}</td>
            <td>{{ $tp->taxa }}</td>
            <td><a href="{{action('TipoPagamentoController@show', $tp->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
            <td><a href="{{action('TipoPagamentoController@edit', $tp->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
            <td><a href="{{route('tipo_pagamento.destroy', $tp->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
        </tr>
        @endforeach
    </table>
    
    {{ $tipo_pagamentos->links() }}
    
@endif

@stop