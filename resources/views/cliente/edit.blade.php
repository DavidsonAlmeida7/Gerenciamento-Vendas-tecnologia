@extends('layouts.app')

@section('title', 'Atualizar cliente')

@section('content')
    <h2>Atualizar cliente</h2>
    @include('form._form_errors')
    {{ Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'PUT']) }}
        @include('cliente._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection