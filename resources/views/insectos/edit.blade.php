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
    <div class="container" style="opacity: 1;">
        <div class="card border rounded shadow-lg o-hidden border-0 my-5" style="background-color: rgba(84,221,82,0.2);opacity: 1;color: #858796;/*background-image: url(&quot;/assets/img/Login/backgroundAC-login.png&quot;);*/">
            <div class="card-body p-0" style="opacity: 1;background-color: rgba(255,255,255,0.38);">
                <div class="row" style="opacity: 1;">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center"><label style="color: #000000;font-size: 35px;font-family: Roboto, sans-serif;filter: blur(0px) brightness(96%) contrast(87%) grayscale(0%) hue-rotate(0deg) invert(0%) saturate(74%) sepia(0%);font-weight: bold;"><strong>REGISTRA UN INSECTO</strong></label></div>
                            <form class="user" enctype="multipart/form-data" action="{{route('insectos.update', $insecto->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-group row"><label>Nombre</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->nombre}}" name="nombre"></div>
                                <div class="form-group row"><label>Temporada</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->temporada}}" name="temporada"></div>
                                <div class="form-group row"><label>¿Ha sido capturado?</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->capturado}}" name="capturado"></div>
                                <div class="form-group row"><label>¿Ha sido donado al museo?</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->donado}}" name="donado"></div>
                                <div class="form-group row"><label>Ubicacion de captura</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->ubicacion}}" name="ubicacion"></div>
                                <div class="form-group row"><label>Fecha de la captura</label><input class="form-control d-lg-flex justify-content-lg-center form-control-user" type="text"  placeholder="{{$insecto->fecha_capturado}}" name="fecha_capturado"></div>
                                <div class="form-group row"><label>Foto</label><input type="file" name="foto"></div>
                                <div class="form-group row"><label>Descripcion</label><textarea class="form-control" name="descripcion" placeholder="{{$insecto->descripcion}}"></textarea></div>
                                <div class="form-row">
                                    <div class="form-group"><a href="{{route('insectos.index')}}" class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(48,99,230);font-style: normal;font-weight: bold;">Regresar al inicio</a></div>
                                    <div class="col"><button class="btn btn-primary btn-block text-white btn-user" style="background-color: rgb(57,198,71);font-style: normal;font-weight: bold;">Registrar insecto</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;/assets/img/CreateAccount/socrates_create.png&quot;);background-repeat: no-repeat;background-size: contain;"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('scripts')
@endsection
</body>