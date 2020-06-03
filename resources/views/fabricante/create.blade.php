@extends('layouts.app')

@section('title', 'Cadastro de fabricantes')

@section('content')
    <h2>Novo Fabricante</h2>
    <hr>
    @include('form._form_errors')
    {{ Form::open(['route' => 'fabricante.store']) }}
        @include('fabricante._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@stop