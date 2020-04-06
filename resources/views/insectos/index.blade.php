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
           
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Tabla de insectos</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>ID</th>
                                        <th>Temporada</th>
                                        <th>Donado</th>
                                        <th>Fecha captura</th>
                                        <th>Estado</th>
                                        <th>Más datos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($insectos as $insecto)
                                    <tr>
                                        <td><img class="rounded-circle mr-2" width="30" height="30" src="/assets/img/avatars/avatar1.jpeg">{{$insecto->nombre}}</td>
                                        <td>{{$insecto->id}}</td>
                                        <td>{{$insecto->temporada}}</td>
                                        <td>{{$insecto->donado}}</td>
                                        <td>{{$insecto->fecha_capturado}}</td>
                                        <td>{{$insecto->estado}}</td>
                                        <td><a href="{{route('insectos.show',$insecto->id)}}" class="btn btn-primary" type="button">Datos</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Nombre</strong></td>
                                        <td><strong>ID</strong></td>
                                        <td><strong>Temporada</strong></td>
                                        <td><strong>Donado</strong></td>
                                        <td><strong>Fecha captura</strong></td>
                                        <td><strong>Estado</strong></td>
                                        <td><strong>Más datos</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endsection
        </div>

    @section('scripts')
    @endsection
</body>