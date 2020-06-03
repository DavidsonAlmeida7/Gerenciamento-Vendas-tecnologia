@extends('layouts.app')

@section('title', 'Atualizar Tipo de pagamento')

@section('content')
    <h2>Atualizar Tipo de Pagamento</h2>
    @include('form._form_errors')
    {{ Form::model($tipo_pagamento, ['route' => ['tipo_pagamento.update', $tipo_pagamento->id], 'method' => 'PUT']) }}
        @include('tipo_pagamento._form')
        {{ Form::button('<i class="far fa-save fa-lg"></i> Salvar', ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    {{ Form::close() }}
@endsection