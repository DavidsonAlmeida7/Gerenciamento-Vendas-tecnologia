{{ Form::hidden('produto', $produto) }}

@component('form._form_group', ['field' => 'nome'])
    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do produto']) }}
@endcomponent

@component('form._form_group', ['field' => 'modelo_id'])
    {{ Form::label('modelo_id', 'Modelo', ['class' => 'control-label']) }}
    {{ Form::select('modelo_id', $modelos, null, ['class' => 'form-control', 'placeholder' => '-- Selecione o Fabricante --'])}}
@endcomponent

@component('form._form_group', ['field' => 'fabricante_id'])
    {{ Form::label('fabricante_id', 'Fabricante', ['class' => 'control-label']) }}
    {{ Form::select('fabricante_id', $fabricantes, null, ['class' => 'form-control', 'placeholder' => '-- Selecione o Fabricante --'])}}
@endcomponent

@component('form._form_group', ['field' => 'descricao'])
    {{ Form::label('descricao', 'Descrição', ['class' => 'control-label']) }}
    {{ Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 6]) }}
@endcomponent

@component('form._form_group', ['field' => 'quantidade_estoque'])
    {{ Form::label('quantidade_estoque', 'Quantidade no estoque', ['class' => 'control-label']) }}
    {{ Form::number('quantidade_estoque', null, ['class' => 'form-control', 'min' => 0]) }}
@endcomponent

@component('form._form_group', ['field' => 'preco'])
    {{ Form::label('preco', 'Preço', ['class' => 'control-label']) }}
    {{ Form::number('preco', null, ['class' => 'form-control', 'step' => '0.01']) }}
@endcomponent

@component('form._form_group', ['field' => 'foto'])
    {{ Form::label('foto', 'Foto', ['class' => 'control-label']) }} <br>
    {{ Form::file('foto') }}
@endcomponent
