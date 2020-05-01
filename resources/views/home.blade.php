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

    <div class="row d-block d-sm-none">
        <div class="col-md-12 col-lg-12">
            <div class="mb-3 card">
                <canvas id="myChartMobile" ></canvas>
            </div>
        </div>
    </div>

    <div class="row d-none d-sm-block">
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

@include('charts.lineReport')
@include('charts.pieReport')
@include('charts.mobileLineReport')

@endsection
