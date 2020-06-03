@extends('layouts.app')

@section('title', 'Atualizar modelo')

@section('content')
    <h2>Atualizar modelo</h2>
    @include('form._form_errors')
    {{ Form::model($modelo, ['route' => ['modelo.update', $modelo->id], 'method' => 'PUT']) }}
        @include('modelo._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection