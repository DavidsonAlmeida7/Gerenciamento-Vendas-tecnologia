@extends('layouts.app')

@section('title', 'Cadastro de vendas')

@section('content')
    <h2>Nova Venda</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'venda.store']) }}
        @include('venda._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop