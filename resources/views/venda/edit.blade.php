@extends('layouts.app')

@section('title', 'Atualizar venda')

@section('content')
    <h2>Atualizar venda</h2>
    @include('form._form_errors')
    {{ Form::model($venda, ['route' => ['venda.update', $venda->id], 'method' => 'PUT']) }}
        @include('venda._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection