@extends('layouts.app')

@section('title', 'Detalhes do tipo de pagamento')

@section('content')
    <h2>Ver Tipo de Pagamento</h2>
    <a href="{{action('TipoPagamentoController@edit', $tipo_pagamento->id)}}" class="btn btn-primary"><span class="far fa-eye fa-lg"></span> Editar</a>
    <a href="{{route('tipo_pagamento.destroy', $tipo_pagamento->id)}}" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}">
        <span class="far fa-eye fa-lg"></span> Excluir</a>
    {{Form::open(['route' => ['tipo_pagamento.destroy', $tipo_pagamento->id], 'method' => 'GET', 'id' => 'form-delete'])}}
    {{Form::close()}}
    <hr>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $tipo_pagamento->id }}</td>
        </tr>
        <tr>
            <th scope="row">Tipo</th>
            <td>{{ $tipo_pagamento->tipo }}</td>
        </tr>
        <tr>
            <th scope="row">Taxa</th>
            <td>{{ $tipo_pagamento->taxa }}</td>
        </tr>
        </tbody>
    </table>
@endsection