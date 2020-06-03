@extends('layouts.app')

@section('title', 'Atualizar cidade')

@section('content')
    <h2>Atualizar cidade</h2>
    @include('form._form_errors')
    {{ Form::model($cidade, ['route' => ['cidade.update', $cidade->id], 'method' => 'PUT']) }}
        @include('cidade._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection