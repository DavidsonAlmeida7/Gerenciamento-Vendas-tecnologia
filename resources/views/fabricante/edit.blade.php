@extends('layouts.app')

@section('title', 'Atualizar fabricante')

@section('content')
    <h2>Atualizar fabricante</h2>
    @include('form._form_errors')
    {{ Form::model($fabricante, ['route' => ['fabricante.update', $fabricante->id], 'method' => 'PUT']) }}
        @include('fabricante._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection