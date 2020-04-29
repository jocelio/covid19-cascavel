@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Novo Registro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(Request::is('*/editar'))
                            {!! Form::model($cliente, ['method'=>'PATCH', 'url'=> 'clientes/'.$cliente->id]) !!}
                        @else
                            {!! Form::open(['url' => 'report/insert']) !!}
                        @endif

                        {!! Form::label('confirmed', 'Confirmados') !!}
                        {!! Form::input('text', 'confirmed', null, ['class' => 'form-control', 'autofocus','required', 'placeholder' => 'Confirmados'])  !!}

                        {!! Form::label('discarded', 'Descartados') !!}
                        {!! Form::input('text', 'discarded', null, ['class' => 'form-control', 'required', 'placeholder' => 'Descartados'])  !!}

                        {!! Form::label('under_investigation', 'Em Investigação') !!}
                        {!! Form::input('text', 'under_investigation', null, ['class' => 'form-control', 'required', 'placeholder' => 'Em Investigação'])  !!}

                        {!! Form::label('interned_outside', 'Internados Fora do Município') !!}
                        {!! Form::input('text', 'interned_outside', null, ['class' => 'form-control', 'required', 'placeholder' => 'Internados Fora do Município'])  !!}

                        {!! Form::label('cured', 'Curados') !!}
                        {!! Form::input('text', 'cured', null, ['class' => 'form-control', 'required', 'placeholder' => 'Curados'])  !!}

                        {!! Form::label('deaths', 'Mortes') !!}
                        {!! Form::input('text', 'deaths', null, ['class' => 'form-control', 'required', 'placeholder' => 'Mortes'])  !!}

                        {!! Form::label('report_date', 'Data') !!}
                        {!! Form::input('text', 'report_date', null, ['class' => 'form-control datepicker', 'required', 'placeholder' => 'Data'])  !!}


                        <div class="row">
                            <div class="col mt-4">
                                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                <a href="/report" class="float-right btn btn-default"> Voltar </a>
                            </div>
                        </div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
