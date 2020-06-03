{{ Form::hidden('cliente', $cliente) }}

@component('form._form_group', ['field' => 'nome'])
    {{ Form::label('nome', 'Nome', ['class' => 'control-label']) }}
    {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do cliente']) }}
@endcomponent

@component('form._form_group', ['field' => 'email'])
    {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Digite o e-mail do cliente'])}}
@endcomponent

@component('form._form_group', ['field' => 'endereco'])
    {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
    {{ Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Digite o endereço do cliente'])}}
@endcomponent

@component('form._form_group', ['field' => 'cidade_id'])
    {{ Form::label('cidade_id', 'Cidade', ['class' => 'control-label']) }}
    {{ Form::select('cidade_id', $cidades, null, ['class' => 'form-control', 'placeholder' => '-- Selecione a Cidade --'])}}
@endcomponent

@component('form._form_group', ['field' => 'telefone'])
    {{ Form::label('telefone', 'Telefone', ['class' => 'control-label']) }}
    {{ Form::text('telefone', null, ['class' => 'form-control', 'id' => 'telefone'])}}
@endcomponent

@component('form._form_group', ['field' => 'cpf_cnpj'])
    {{ Form::label('cpf_cnpj', 'CPF/CNPJ', ['class' => 'control-label']) }}
    {{ Form::text('cpf_cnpj', null, ['class' => 'form-control', 'maxlength' => '18', 'onkeypress' => 'mascaraMutuario(this,cpfCnpj)', 'onblur' => 'clearTimeout()'])}}
@endcomponent


@section('scripts')
    <script src="{{ asset('js/maskedinput.js')}}"></script>
    <script>
        jQuery("#telefone").mask("(99) 9999-9999");
            
        function mascaraMutuario(o,f){
            v_obj=o
            v_fun=f
            setTimeout('execmascara()',1)
        }

        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }

        function cpfCnpj(v){
        
            //Remove tudo o que não é dígito
            v=v.replace(/\D/g,"")
        
            if (v.length <= 11) { //CPF

                //Coloca um ponto entre o terceiro e o quarto dígitos
                v=v.replace(/(\d{3})(\d)/,"$1.$2")
                //Coloca um ponto entre o terceiro e o quarto dígitos
                //de novo (para o segundo bloco de números)
                v=v.replace(/(\d{3})(\d)/,"$1.$2")
                //Coloca um hífen entre o terceiro e o quarto dígitos
                v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
            
            } else { //CNPJ
            
                //Coloca ponto entre o segundo e o terceiro dígitos
                v=v.replace(/^(\d{2})(\d)/,"$1.$2")          
                //Coloca ponto entre o quinto e o sexto dígitos
                v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
                //Coloca uma barra entre o oitavo e o nono dígitos
                v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
                //Coloca um hífen depois do bloco de quatro dígitos
                v=v.replace(/(\d{4})(\d)/,"$1-$2")
            
            }
        
            return v
        
        }
        
    </script>
@endsection