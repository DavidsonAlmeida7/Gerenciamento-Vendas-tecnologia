{{ Form::hidden('tipo_pagamento', $tipo_pagamento) }}

@component('form._form_group', ['field' => 'tipo'])
    {{ Form::label('tipo', 'Tipo', ['class' => 'control-label']) }}
    {{ Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'Digite o tipo de pagamento']) }}
@endcomponent

@component('form._form_group', ['field' => 'taxa'])
    {{ Form::label('taxa', 'Taxa', ['class' => 'control-label']) }}
    {{ Form::number('taxa', null, ['class' => 'form-control', 'step' => '0.1']) }}
@endcomponent
