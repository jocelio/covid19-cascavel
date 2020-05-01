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
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Confirmados</div>
                        <div class="widget-subheading">Last year expenses</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->confirmed}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Descartados</div>
                        <div class="widget-subheading">Total Clients Profit</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->discarded}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"> Em Investigação</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->under_investigation}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Internados Fora do Município</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->interned_outside}} </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Curados</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->cured}} </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Óbitos</div>
                        <div class="widget-subheading">People Interested</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$lastReport->deaths}} </span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="" href="whatsapp://send?text=https://covid19-cascavel.herokuapp.com/">
        <img src="{{ asset('images/whatsapp-48.png') }}" alt="Compartilhe no Whatsapp" title="Compartilhe no Whatsapp" width="30"/>
    </a>
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

@endsection
