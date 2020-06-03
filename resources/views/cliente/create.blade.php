@extends('layouts.app')

@section('title', 'Cadastro de clientes')

@section('content')
    <h2>Novo cliente</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'cliente.store']) }}
        @include('cliente._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop