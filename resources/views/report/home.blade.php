@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            Relatório Diário
                        </div>
                        <div class="col pull-right">
                            <a href="/report/create" class="float-right btn btn-info"> Novo </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Confirmados</th>
                                <th>Descartados</th>
                                <th>Em Investigação</th>
                                <th>Internados Fora do Mun.</th>
                                <th>Curados</th>
                                <th>Mortes</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{$report->getFormattedReportDate()}}</td>
                                    <td>{{$report->confirmed}}</td>
                                    <td>{{$report->discarded}}</td>
                                    <td>{{$report->under_investigation}}</td>
                                    <td>{{$report->interned_outside}}</td>
                                    <td>{{$report->cured}}</td>
                                    <td>{{$report->deaths}}</td>
                                    <td class="btn-group">

                                        {!! Form::model($report, ['method'=>'DELETE', 'url'=> 'report/'.$report->daily_report_id]) !!}
                                        <a href="/report/{{$report->daily_report_id}}/edit" class="btn btn-outline-info">Editar</a>
                                        <button type="submit" onClick="return confirmDeletion()"
                                                href="/clientes/{{$report->id}}/excluir" class="btn btn-outline-danger">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
