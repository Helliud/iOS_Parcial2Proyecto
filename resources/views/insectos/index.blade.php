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
            <div class="row">
            <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="txtNombre">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                </form>
            
                <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Estado</label>
                                    <select name="estado" class="form-control" data-toggle="dropdown" aria-expanded="false" id="slcEstado">
                                            <option value="Pendiente" class="dropdown-item form-control" role="presentation">Pendiente</option>
                                            <option value="En proceso" class="dropdown-item form-control" role="presentation">En proceso</option>
                                            <option value="Terminado" class="dropdown-item form-control" role="presentation">Terminado</option>
                                    </select>                                     
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                </form>

                <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fecha de captura</label>
                                <input type="text" class="form-control" name="fecha_capturado" id="txtFecha">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                </form>

                <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Temporada</label>
                                    <select name="temporada" class="form-control" data-toggle="dropdown" aria-expanded="false" id="slcEstado">
                                        <option value="Primavera" class="dropdown-item form-control" role="presentation">Primavera</option>
                                        <option value="Verano" class="dropdown-item form-control" role="presentation">Verano</option>
                                        <option value="Otoño" class="dropdown-item form-control" role="presentation">Otoño</option>
                                        <option value="Invierno" class="dropdown-item form-control" role="presentation">Invierno</option>
                                    </select>                                     
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                </form>
            </div>
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
                                        <td class="nombre"><img class="rounded-circle mr-2" width="30" height="30" src="/storage/assets/img/imgInsectos/{{$insecto->foto}}">{{$insecto->nombre}}</td>
                                        <td>{{$insecto->id}}</td>
                                        <td>{{$insecto->temporada}}</td>
                                        <td>{{$insecto->donado}}</td>
                                        <td>{{$insecto->fecha_capturado}}</td>
                                        <td>{{$insecto->estado}}</td>
                                        <td>
                                        <form method="POST" 
                                            action="{{route('insectos.destroy',$insecto->id)}}">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Show -->
                                            <a 
                                            href="{{route('insectos.show',$insecto->id)}}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                            </a>

                                            @if(Auth::user()->id_tipo_usuario == 1)
                                            <!-- Edit -->
                                            <a href="{{route('insectos.edit',$insecto->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$insecto->id}})" 
                                            data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>                                        </form>
                                            @endif
                                    </td>                                        
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

                <!--
    <section class="no-padding" id="about">
        <div class="container-fluid">
                    
        <div class="row">
        @foreach($insectos as $insecto)
        <div class="img_ct">
            <img class="instagram-home-items" src="/assets/img/avatars/avatar1.jpeg">

            <div class="text-content">
                {{$insecto->nombre}}
            </div>
        </div>        

        @endforeach
        <img class="rounded-circle mb-3 mt-4" src="/assets/img/avatars/avatar1.jpeg" width="160" height="160" />

        </div>
        </div>
    </section>-->

    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <p class="text-center">Are You Sure Want To Delete? <span id="spn_nombre"></span></p>
             </div>
             <div class="modal-footer">
             <form action="#" id="deleteForm" method="post">
             @csrf
            @method('DELETE')
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
             </div>
         </div>
     </form>
   </div>
  </div>
</div>
            @endsection
        </div>

    @section('scripts')
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')})
    </script>

    <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{route("insectos.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
         $("#spn_nombre").text(id);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>  
  @endsection
</body>