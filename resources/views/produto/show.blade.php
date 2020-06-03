@extends('layouts.app')

@section('title', 'Detalhes do produto')

@section('content')
    <h2>Ver Produto</h2>
    <a href="{{action('ProdutoController@edit', $produto->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('produto.destroy', $produto->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['produto.destroy', $produto->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $produto->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $produto->nome }}</td>
        </tr>
        <tr>
            <th scope="row">Modelo</th>
            <td>{{ $produto->modelo_id }}</td>
        </tr>
        <tr>
            <th scope="row">Fabricante</th>
            <td>{{ $produto->fabricante_id }}</td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td>{{ $produto->descricao }}</td>
        </tr>
        <tr>
            <th scope="row">Quantidade em estoque</th>
            <td>{{ $produto->quantidade_estoque }}</td>
        </tr>
        <tr>
            <th scope="row">Preço</th>
            <td>{{ 'R$ ' . number_format($produto->preco, 2, ",", ".") }}</td>
        </tr>
        <tr>
            <th scope="row">Código de barra</th>
            <td>
                <img src="data:image/png;base64,{{ base64_encode($barcode)}}">
            </td>
        </tr>
        <tr>
            <th scope="row">QR Code</th>
            <td>{!! DNS2D::getBarcodeHTML($produto->qrcode, 'QRCODE') !!}</td>
        </tr>
        </tbody>
    </table>
@endsection