@extends('layouts.admin')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Usuarios</title>
    @section('estilos')
    @endsection
</head>

<body id="page-top">
           @section('navbar')
           
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Tabla de usuarios</p>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>ID</th>
                                        <th>Correo</th>
                                        <th>Tipo de usuario</th>
                                        <th>Más datos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td class="nombre"><img class="rounded-circle mr-2" width="30" height="30" src="/assets/img/avatars/avatar1.jpeg">{{$usuario->name}}</td>
                                        <td>{{$usuario->id}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->tipo_usuario}}</td>
                                        <td>
                                        <form method="POST" 
                                            action="{{route('admin.destroy',$usuario->id)}}">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Show -->
                                            <a 
                                            href="{{route('admin.show',$usuario->id)}}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Edit -->
                                            <a href="{{route('admin.edit',$usuario->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$usuario->id}})" 
                                            data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>                                        </form>
                                    </td>                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Nombre</strong></td>
                                        <td><strong>ID</strong></td>
                                        <td><strong>Correo</strong></td>
                                        <td><strong>Tipo de usuario</strong></td>
                                        <td><strong>Más datos</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

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
         var url = '{{route("admin.destroy", ":id") }}';
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