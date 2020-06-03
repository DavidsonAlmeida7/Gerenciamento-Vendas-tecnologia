{{ Form::hidden('fabricante', $fabricante) }}

@component('form._form_group', ['field' => 'nome'])
    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do fabricante']) }}
@endcomponent

@component('form._form_group', ['field' => 'site'])
    {{ Form::label('site', 'Site', ['class' => 'control-label']) }}
    {{ Form::text('site', null, ['class' => 'form-control', 'placeholder' => 'Digite o link do fabricante'])}}
@endcomponent
