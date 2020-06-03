@extends('layouts.app')

@section('title', 'Cadastro de produtos')

@section('content')
    <h2>Novo produto</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'produto.store', 'method' => 'POST', 'files' => true]) }}
        @include('produto._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop