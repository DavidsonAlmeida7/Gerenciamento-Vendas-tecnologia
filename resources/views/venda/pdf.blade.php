<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - {{ $vendas-> }}</title>
</head>
<body>
    @if ($vendas)
        <h2 >Vendas</h2>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <tr class="header">
                <th>ID</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Endereço</th>
                <th>Valor Total</th>
                <th style="width:7%;">Ver</th>
                <th style="width:7%;">Atualizar</th>
                <th style="width:7%;">Apagar</th>
            </tr>
            <tr>
                <th>
                </th>
                <th>
                    <form action="{{action('VendaController@search')}}" method="GET">
                        <input class="form-control" type="search" name="cliente_id" placeholder="Pesquisar">
                    </form>
                </th>
                <th>
                    <form action="{{action('VendaController@search')}}" method="GET">
                        <select class="form-control" name="vendedor_id">
                            <option value=""></option>
                            @foreach ($vendedores as $ven)
                                <option value="{{ $ven->id }}">{{ $ven->nome }}</option>
                            @endforeach
                        </select>
                    </form>
                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($vendas as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->cliente->nome }}</td>
                <td>{{ $v->vendedor->nome }}</td>
                <td>{{ $v->cliente->cidade->nome }}</td>
                <td>{{ 'R$ ' . number_format($v->valor_total, 2, ",", ".") }}</td>
                <td><a href="{{action('VendaController@show', $v->id)}}"><span class="far fa-eye fa-lg"></span></a></td>
                <td><a href="{{action('VendaController@edit', $v->id)}}"><span class="fas fa-edit fa-lg"></span></a></td>
                <td><a href="{{route('venda.destroy', $v->id)}}"><span class="fas fa-trash-alt fa-lg" style="color:red" onclick="return confirm('Deseja excluir este item?')"></span></a></td>
            </tr>
            @endforeach
        </table>

    @else
        <h2>Vendas</h2>
        <a href="{{action('VendaController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar venda</a>
        <hr>
        <div class="alert alert-danger">Você não tem nenhuma venda cadastrada.</div>
    @endif
</body>
</html>

