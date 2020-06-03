@extends('layouts.app')

@section('title', 'Cadastro de cidades')

@section('content')
    <h2>Nova Cidade</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'cidade.store']) }}
        @include('cidade._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop