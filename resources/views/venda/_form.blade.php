{{ Form::hidden('venda', $venda) }}

@component('form._form_group', ['field' => 'cliente_id'])
    {{ Form::label('cliente_id', 'Cliente', ['class' => 'control-label']) }}
    {{ Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'placeholder' => '-- Selecione o Cliente --']) }}
@endcomponent

@component('form._form_group', ['field' => 'vendedor_id'])
    {{ Form::label('vendedor_id', 'Vendedor', ['class' => 'control-label']) }}
    {{ Form::select('vendedor_id', $vendedores, null, ['class' => 'form-control', 'placeholder' => '-- Selecione o Vendedor --']) }}
@endcomponent

@component('form._form_group', ['field' => 'produto_id'])
    {{ Form::label('produto_id', 'Produto', ['class' => 'control-label']) }}
    <select class="form-control" name="produto_id" id="produto_id">
        <option value="">-- Selecione o Produto --</option>
        @foreach ($produtos as $item)
            <option class="{{$item->quantidade_estoque === 0 ? 'alert alert-danger' : '' }}" {{$item->quantidade_estoque === 0 ? 'disabled="disabled"' : '' }} value="{{ $item->id }}">{{ $item->quantidade_estoque === 0 ? $item->nome . ' - Esgotado!' : $item->nome }}</option>
        @endforeach
    </select>
@endcomponent

@component('form._form_group', ['field' => 'tipo_pagamento_id'])
    {{ Form::label('tipo_pagamento_id', 'Forma de pagamento', ['class' => 'control-label']) }}
    @foreach ($tipo_pagamentos as $pag)
        <div><input type="radio" name="tipo_pagamento_id" id="tipo_pagamento_id" value="{{ $pag->id }}"> {{ $pag->tipo }}</div>
    @endforeach
        <div class="col-lg-offset-1" style="color:#999;"> Selecione a forma de pagamento.</div>
@endcomponent

@component('form._form_group', ['field' => 'descricao'])
    {{ Form::label('descricao', 'Descrição', ['class' => 'control-label']) }}
    {{ Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 6]) }}
@endcomponent