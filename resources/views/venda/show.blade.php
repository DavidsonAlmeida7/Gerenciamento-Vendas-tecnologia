@extends('layouts.app')

@section('title', 'Detalhes da venda')

@section('content')
    <h2>Ver Venda</h2>
    <a href="{{action('VendaController@edit', $venda->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('venda.destroy', $venda->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['venda.destroy', $venda->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $venda->id }}</td>
        </tr>
        <tr>
            <th scope="row">Cliente</th>
            <td>{{ $venda->cliente->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Vendedor</th>
            <td>{{ $venda->vendedor->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Produto</th>
            <td>{{ $venda->produto->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Forma de Pagamento</th>
            <td>{{ $venda->tipo_pagamento->tipo }}</td>
        </tr>
        <tr>
            <th scope="row">Endereço</th>
            <td>{{ $venda->cliente->cidade->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Data de Emissão</th>
            <td>{{ $venda->data_emissao_formatted }}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{ $venda->descricao }}</td>
        </tr>
        <tr>
            <th scope="row">Frete</th>
            <td>{{ 'R$ ' . number_format($venda->frete, 2, ",", ".") }}</td>
        </tr>
        <tr>
            <th scope="row">Valor Total</th>
            <td>{{ 'R$ ' . number_format($venda->valor_total, 2, ",", ".") }}</td>
        </tr>
        </tbody>
    </table>
@endsection