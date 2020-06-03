{{ Form::hidden('cidade', $cidade) }}

@component('form._form_group', ['field' => 'nome'])
    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome da cidade']) }}
@endcomponent

@component('form._form_group', ['field' => 'estado'])
    {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
    {{ Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Digite o estado da cidade'])}}
@endcomponent
