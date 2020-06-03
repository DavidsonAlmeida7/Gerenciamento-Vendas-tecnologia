@extends('layouts.app')

@section('title', 'Vendas')

@php

foreach ($fabricantes as $key => $qtd) {
    $quantidades[] = $qtd;
    $nomes[] = $key;

    $grafico[] = [
        'name' => $key,
        'y' =>  $qtd,
        'drilldown' => $key,
    ];
}

@endphp

@section('content')
    
    <figure class="highcharts-figure">
        <div id="container" style="height: 800px;"></div>
        <p class="highcharts-description" style="text-align: center;">
            Gráfico mostrando quantidade de venda do Fabricante.
        </p>
    </figure>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function() {
        
            var dados = {!! json_encode($grafico) !!};
        
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Fabricantes com mais vendas, Distribuidora Optimus'
                },
                subtitle: {
                    text: 'Gráfico mostrando quantidade de vendas dos Fabricantes.'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total de quantidade nas vendas'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> produtos no total<br/>'
                },
                credits: {
                    enabled: false
                },
                series: [
                    {
                        name: "Fabricante",
                        colorByPoint: true,
                        data: dados,
                    }
                ],
                /*drilldown: {
                    series: [
                        {
                            name: "Apple",
                            id: "Apple",
                            data: [
                                [
                                    "v65.0",
                                    0.1
                                ],
                                [
                                    "v64.0",
                                    1.3
                                ],
                                [
                                    "v63.0",
                                    53.02
                                ],
                                [
                                    "v62.0",
                                    1.4
                                ],
                                [
                                    "v61.0",
                                    0.88
                                ],
                            ]
                        },
                    ]
                }*/
            });
        });
    </script>
@endsection