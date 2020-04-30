@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row pt-4 border-top" >
                <div class="col">
                    <h3 class="text-center">Última atualização - {{$lastReport->getFormattedReportDate()}}</h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            {{$lastReport->confirmed}} Confirmados
                        </li>
                        <li class="list-group-item">
                            {{$lastReport->discarded}} Descartados
                        </li>
                        <li class="list-group-item">
                            {{$lastReport->under_investigation}} Em Investigação
                        </li>
                        <li class="list-group-item">
                            {{$lastReport->interned_outside}} Internados Fora do Município
                        </li>
                        <li class="list-group-item">
                            {{$lastReport->cured}} Curados
                        </li>
                        <li class="list-group-item">
                            {{$lastReport->deaths}} Mortes
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row" >
                <div class="col pt-3">
                    <a class="" href="whatsapp://send?text=https://covid19-cascavel.herokuapp.com/">
                        <img src="{{ asset('images/whatsapp-48.png') }}" alt="Compartilhe no Whatsapp" title="Compartilhe no Whatsapp" width="30"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row mt-4">
                <div class="col">
                    <canvas id="myChart" ></canvas>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <canvas id="myPieChart" ></canvas>
                </div>
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
                        borderColor: '#33B3E9',
                        backgroundColor: '#33B3E9',
                    },
                    {
                        label: 'Confirmados',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->confirmed!!},@endforeach],
                        borderWidth: 3,
                        borderColor: '#FF6384',
                        backgroundColor: '#FF6384',
                    },
                    {
                        label: 'Em Investigação',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->under_investigation!!},@endforeach],
                        borderWidth: 2,
                        borderColor: '#FEB125',
                        backgroundColor: '#FEB125',
                    },
                    {
                        label: 'Curados',
                        fill: false,
                        data: [@foreach($reports as $report) {!!$report->cured!!},@endforeach],
                        borderWidth: 2,
                        borderColor: '#69D7AB',
                        backgroundColor: '#69D7AB',
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
                }
            }
        });

        var myPieChart = new Chart(document.getElementById('myPieChart'), {
            type: 'pie',
            data: {
                datasets: [{
                    data: [{!!$lastReport->confirmed - $lastReport->cured - $lastReport->death!!}, {!!$lastReport->cured!!}, {!!$lastReport->deaths!!}],
                    backgroundColor: ["#FEB125", "#69D7AB", "#9F2B55"],
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

</div>
@endsection
