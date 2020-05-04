@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <p>Esse projeto está sendo desenvolvido com o propósito de compartilhar informações sobre o Covid-19 em Cascavel-CE.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
{{--                <img width="100%" src="{{ asset('images/profile/jocelio.jpg') }}" alt="Card image cap" class="card-img-top">--}}
                <div class="card-body">
                    Desenvolvido Por:
                    <a href="https://www.instagram.com/jocelio.iam/">
                        Jocélio Lima
                    </a>
                    |
                    <a href="mailto:flavio.vitorianodev@gmail.com/">
                    Flávio Vitoriano
                    </a>
                    |
                    <a href="https://www.instagram.com/rodrigosoares.alb/">
                    Rodrigo Soares
                    </a>
                    |
                    <a href="https://www.instagram.com/benemota.ds/">
                       Bené Mota
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
