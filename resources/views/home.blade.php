
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="content px-2 d-md-flex flex-wrap justify-content-between"> <!-- Agrega clases flexibles para dispositivos medianos y superiores -->
        <div class="info-box mb-3"> <!-- Agrega la clase 'mb-3' para un margen inferior -->
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Mensajes</span>
                <span class="info-box-number">200</span>
            </div>
        </div>
        <div class="info-box mb-3"> <!-- Agrega la clase 'mb-3' para un margen inferior -->
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Campañas</span>
                <span class="info-box-number">100</span>
            </div>
        </div>
        <div class="info-box mb-3"> <!-- Agrega la clase 'mb-3' para un margen inferior -->
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">50</span>
            </div>
        </div>
        <div class="info-box mb-3"> <!-- Agrega la clase 'mb-3' para un margen inferior -->
            <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">50</span>
            </div>
        </div>
    </div>

    <div class="content px-2 row">
        <div class="col-md-6 mb-3"> <!-- Usa 'col-md-6' para dispositivos medianos y superiores -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-6 mb-3"> <!-- Usa 'col-md-6' para dispositivos medianos y superiores -->
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>44</h3>
                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="text-center">Essato Marketing y Publicidad</h1>
    <h5 class="text-center"> Bienvenido <b>{{ auth::user()->name }} </b></h5>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!--<div class="card-header">{{ __('Dashboard') }}</div>-->              
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop