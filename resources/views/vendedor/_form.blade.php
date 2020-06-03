{{ Form::hidden('vendedor', $vendedor) }}

@component('form._form_group', ['field' => 'nome'])
    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do vendedor']) }}
@endcomponent

@component('form._form_group', ['field' => 'email'])
    {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Digite o e-mail do vendedor'])}}
@endcomponent

@component('form._form_group', ['field' => 'endereco'])
    {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
    {{ Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Digite o endereço do vendedor'])}}
@endcomponent

@component('form._form_group', ['field' => 'cidade_id'])
    {{ Form::label('cidade_id', 'Cidade', ['class' => 'control-label']) }}
    {{ Form::select('cidade_id', $cidades, null, ['class' => 'form-control', 'placeholder' => '-- Selecione a Cidade --'])}}
@endcomponent

@component('form._form_group', ['field' => 'telefone'])
    {{ Form::label('telefone', 'Telefone', ['class' => 'control-label']) }}
    {{ Form::text('telefone', null, ['class' => 'form-control'])}}
@endcomponent

@component('form._form_group', ['field' => 'admissao'])
    {{ Form::label('admissao', 'Admissão', ['class' => 'control-label']) }}
    {{ Form::date('admissao', null, ['class' => 'form-control'])}}
@endcomponent

@component('form._form_group', ['field' => 'foto'])
    <div class="custom-file">
    {{ Form::label('foto', 'Foto', ['class' => 'control-label']) }} <br>
    {{ Form::file('foto') }}
    </div>
@endcomponent

@component('form._form_group', ['field' => 'documento_pessoal'])
    {{ Form::label('documento_pessoal', 'Documento Pessoal', ['class' => 'control-label']) }} <br>
    {{ Form::file('documento_pessoal') }}
@endcomponent


<!-- Script mascara do input -->
@section('scripts')
    <script src="{{ asset('js/maskedinput.js')}}"></script>
    <script>
        jQuery("#telefone").mask("(99) 9999-9999");

        /*$('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });*/
    </script>
@endsection