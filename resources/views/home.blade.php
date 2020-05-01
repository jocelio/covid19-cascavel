@extends('layouts.home')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-date icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Última atualização - {{$lastReport->getFormattedReportDate()}}
                    <div class="page-title-subheading">
                        FONTE: <a href="https://www.cascavel.ce.gov.br/"> Prefeitura Municipal De Cascavel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Confirmados</div>
                        <div class="widget-subheading">
                            Crescimento de {{$ratios->confirmedRatio}}% do último relatório.
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->confirmed}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-success">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Descartados</div>
                        <div class="widget-subheading">
                            Crescimento de {{$ratios->discardedRatio}}% do último relatório.
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->discarded}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-warning">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"> Em Investigação</div>
                        <div class="widget-subheading">
                            Crescimento de {{$ratios->underInvestigationRatio}}% do último relatório.
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->under_investigation}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-night-sky">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Internados Fora do Município</div>
                        <div class="widget-subheading">Obtendo informações</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->interned_outside}} </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-info">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Curados</div>
                        <div class="widget-subheading">
                            <a class="text-white" href="https://saude.estadao.com.br/noticias/geral,nao-ha-comprovacao-que-curados-da-covid-19-sejam-imunes-a-doenca-diz-oms,70003282776">
                                Curados não são imunes, previna-se.
                            </a>
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->cured}} </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-royal">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Óbitos</div>
                        <div class="widget-subheading">
                            <span type="button" data-toggle="tooltip"
                                    title="A atual taxa de mortalidade é de {{$ratios->mortalityPercentage}}%, considerando os {{$lastReport->confirmed}} casos confirmados e os {{$lastReport->deaths}} óbitos."
                                    data-placement="bottom" >
                                <i class="fas fa-cross"></i>
                            </span>
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->deaths}} </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
                <canvas id="myChart" ></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
                <canvas id="myPieChart" ></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $labels !!},
                datasets: [
                    {
                        label: 'Descartados',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->discarded!!},@endforeach],
                        borderWidth: 2,
                        borderColor: '#38c172',
                        backgroundColor: '#38c172',
                    },
                    {
                        label: 'Confirmados',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->confirmed!!},@endforeach],
                        borderWidth: 3,
                        borderColor: '#e3342f',
                        backgroundColor: '#e3342f',
                    },
                    {
                        label: 'Em Investigação',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->under_investigation!!},@endforeach],
                        borderWidth: 2,
                        borderColor: '#ffed4a',
                        backgroundColor: '#ffed4a',
                    },
                    {
                        label: 'Curados',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->cured!!},@endforeach],
                        borderWidth: 2,
                        borderColor: '#6cb2eb',
                        backgroundColor: '#6cb2eb',
                    },
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Progressão dos Casos'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Quantidade De Casos',
                            fontSize: 20
                        }
                    }]
                },
                elements: {
                    point:{
                        radius: 0
                    }
                }
            }
        });

        var myPieChart = new Chart(document.getElementById('myPieChart'), {
            type: 'pie',
            data: {
                datasets: [{
                    data: [{!!$lastReport->confirmed - $lastReport->cured - $lastReport->death!!}, {!!$lastReport->cured!!}, {!!$lastReport->deaths!!}],
                    backgroundColor: ["#ffed4a", "#6cb2eb", "#141e30"],
                }],
                labels: ['Ativos','Curados','Mortes'
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Divisão do cenário atual'
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            display: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: '',
                            fontSize: 20
                        }
                    }]
                },

            }
        });

    </script>

@endsection
