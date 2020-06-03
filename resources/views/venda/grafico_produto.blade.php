@extends('layouts.app')

@section('title', 'Vendas')

@php

foreach ($produtos as $key => $qtd) {
    $quantidades[] = $qtd;
    $nomes[] = $key;

    $grafico[] = [
        'name' => $key,
        'y' =>  $qtd,
    ];
}

/*$teste = json_encode($grafico);
echo('<pre>');
print_r($nomes);
echo('</pre>');*/

@endphp

@section('content')
    
    <figure class="highcharts-figure">
        <div id="container" style="height: 900px;"></div>
        <p class="highcharts-description" style="text-align: center;">
            Gráfico demonstrando o uso de um layout de torta 3D. A fatia "Chrome" foi selecionada e é deslocada da pizza. 
            Clique nas fatias para selecioná-las e desmarcá-las.
        </p>
    </figure>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function() {
        
            var dados = {!! json_encode($grafico) !!};
        
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: 'Produtos mais vendidos, Distribuidora Optimus'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    type: 'pie',
                    name: 'Porcentagem',
                    data: dados,
                }]
            });
        });
    </script>
@endsection