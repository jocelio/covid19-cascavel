@extends('layouts.home')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    Nossa missão é ajudar, compartilhar conhecimento é nossa forma de fazer nossa parte.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="main-card mb-3 card">
{{--                <img width="100%" src="{{ asset('images/profile/jocelio.jpg') }}" alt="Card image cap" class="card-img-top">--}}
                <div class="card-body">
                    Jocélio Lima
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    Flávio Vitoriano
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    Bené Mota
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    Rodrigo Soares
                </div>
            </div>
        </div>
    </div>
@endsection
