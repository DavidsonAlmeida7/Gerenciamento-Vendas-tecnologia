@extends('layouts.app')

@section('title', 'Vendas')

@section('content')


    <h2>Vendas</h2>
    <a href="{{action('VendaController@create')}}" type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Cadastrar venda</a>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="table">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Produto</th>
            </tr>
        </thead>
    </table>


@stop

@section('scripts')
    <script>
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('vendas2') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'cliente_id', name: 'cliente_id' },
                    { data: 'produto_id', name: 'produto_id' }
                ],
                "language": {
                    "sProcessing":    "Procesando...",
                    "sLengthMenu":    "Exibir _MENU_ registros por página",
                    "sZeroRecords":   "Nenhum resultado encontrado",
                    "sEmptyTable":    "Nenhum resultado encontrado",
                    "sInfo":          "Exibindo do _START_ até _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty":     "Exibindo do 0 até 0 de um total de 0 registros",
                    "sInfoFiltered":  "(Filtrado de um total de _MAX_ registros)",
                    "sInfoPostFix":   "",
                    "sSearch":        "Buscar:",
                    "sUrl":           "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":    "Último",
                        "sNext":    "Próximo",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Ativar para ordenar a columna de maneira ascendente",
                        "sSortDescending": ": Ativar para ordenar a columna de maneira descendente"
                    }
                }
            });
    </script>
@endsection