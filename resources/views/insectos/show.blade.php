@extends('layouts.admin')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Insectos</title>
    @section('estilos')
    @endsection
</head>

<body id="page-top">
@section('navbar')
<div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <h3 class="text-dark mb-4">{{$insecto->nombre}}</h3>
                <div class="row mb-3">
                    <div class="col-lg-4" style="min-width: 100%;">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="/storage/assets/img/imgInsectos/{{$insecto->foto}}" width="160" height="160">
                                <div class="mb-3"></div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Caracteristicas</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Nombre<span class="float-right">{{$insecto->nombre}}</span></h4>
                                <h4 class="small font-weight-bold">Temporada<span class="float-right">{{$insecto->temporada}}</span></h4>
                                <h4 class="small font-weight-bold">Donado<span class="float-right">{{$insecto->donado}}</span></h4>
                                <h4 class="small font-weight-bold">Capturado<span class="float-right">{{$insecto->capturado}}</span></h4>
                                <h4 class="small font-weight-bold">Ubicacion<span class="float-right">{{$insecto->ubicacion}}</span></h4>
                                <h4 class="small font-weight-bold">Estado actual<span class="float-right">{{$insecto->estado}}</span></h4>
                                <h4 class="small font-weight-bold">Descripcion<span class="float-right">{{$insecto->descripcion}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
</body>