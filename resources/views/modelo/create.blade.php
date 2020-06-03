@extends('layouts.app')

@section('title', 'Cadastro de modelos')

@section('content')
    <h2>Novo Modelo</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'modelo.store']) }}
        @include('modelo._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop