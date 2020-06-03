@extends('layouts.app')

@section('title', 'Atualizar vendedor')

@section('content')
    <h2>Atualizar vendedor</h2>
    @include('form._form_errors')
    {{ Form::model($vendedor, ['route' => ['vendedor.update', $vendedor->id], 'method' => 'PUT', 'files' => true]) }}
        @include('vendedor._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection