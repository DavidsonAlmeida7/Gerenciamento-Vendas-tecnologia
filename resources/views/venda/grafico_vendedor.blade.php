@extends('layouts.app')

@section('title', 'Vendas')

@php

foreach ($vendedores as $key => $qtd) {
    $quantidades[] = $qtd;
    $nomes[] = $key;

    $grafico[] = [
        'name' => $key,
        'low' =>  $qtd,
    ];
}

@endphp

@section('content')
    
    <figure class="highcharts-figure">
        <div id="container" style="height: 700px;"></div>
        <p class="highcharts-description" style="text-align: center;">
            Gráfico mostrando quantidade de venda por cada Vendedor.
        </p>
    </figure>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/dumbbell.js"></script>
    <script src="https://code.highcharts.com/modules/lollipop.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function() {
        
            var dados = {!! json_encode($grafico) !!};
        
            Highcharts.chart('container', {

                chart: {
                    type: 'lollipop'
                },

                accessibility: {
                    point: {
                        valueDescriptionFormat: '{index}. {xDescription}, {point.y}.'
                    }
                },

                legend: {
                    enabled: false
                },

                subtitle: {
                    text: '2020'
                },

                title: {
                    text: 'Quantidade de vendas por vendedor.'
                },

                tooltip: {
                    shared: true
                },

                xAxis: {
                    type: 'category'
                },

                yAxis: {
                    title: {
                        text: 'Quantidade'
                    }
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> no total<br/>'
                },

                series: [{
                    name: 'Vendas',
                    data: dados,
                }]

            });
        });
    </script>
@endsection