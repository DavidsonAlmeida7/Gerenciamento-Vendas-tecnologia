@extends('layouts.app')

@section('title', 'Atualizar produto')

@section('content')
    <h2>Atualizar produto</h2>
    @include('form._form_errors')
    {{ Form::model($produto, ['route' => ['produto.update', $produto->id], 'method' => 'PUT', 'files' => true]) }}
        @include('produto._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection