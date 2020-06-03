@extends('layouts.app')

@section('title', 'Cadastro do vendedor')

@section('content')
    <h2>Novo Vendedor</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'vendedor.store', 'method' => 'POST', 'files' =>true]) }}
        @include('vendedor._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop