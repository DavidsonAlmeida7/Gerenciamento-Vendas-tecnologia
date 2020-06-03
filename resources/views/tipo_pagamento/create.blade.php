@extends('layouts.app')

@section('title', 'Cadastro tipo de pagamento')

@section('content')
    <h2>Novo Tipo de Pagamento</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'tipo_pagamento.store']) }}
        @include('tipo_pagamento._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop