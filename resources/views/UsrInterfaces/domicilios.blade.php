@extends('layouts.admin')
@section('title','Domicilios')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <a href="/domicilios/create"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo domicilio</button></a>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/historial"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Compras</button></a></li>
              <li class="breadcrumb-item active"><a href="/cuenta"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Datos de socio</button></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card" style="border-radius: 10px; background-color: #007bff; color: white;">
          <div class="card-body">
             <i class="fa fa-map-marker" aria-hidden="true"></i> Domicilios de socio <span class="badge badge-dark">{{$usu->code}}</span> {{$usu->name}} {{$usu->aPaterno}} {{$usu->aMaterno}}         
           </div>
        </div>              
        <div class="row">
      <div class="col-md-12"> 
        <div class="card">  
          <div class="card-header bg-primary">Lista de usuarios</div>
          <div class="card-body"> 
            <div class="table-responsive">  
              <table id="domicilios" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>                                                        
                    <th>Calle</th>
                    <th>No Exterior</th>                            
                    <th>CP</th>
                    <th>Colonia</th>
                    <th>Municipio</th>                            
                    <th>Editar</th>
                    <th>Elminar</th>
                  </tr>
                </thead>
                <tbody> 
                </tbody>
              </table>
            </div>  
          </div>  
        </div>
      </div>  
    </div>  
      </div>
    </section>
    <!-- /.content -->

@endsection
@section('scripts')
<script>
  $(document).ready( function () {
    $('#domicilios').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerDomicilios",
        "columns": [   
            {data:'nombre'},         
            {data:'calle'},
            {data:'noext'},
            {data:'cp'},
            {data:'colonia'},
            {data:'localidad'},            
            {data:'edit',orderable:false, searchable:false},
            {data:'delete',orderable:false, searchable:false}
        ],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Documentos",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
        }
    });
  });

 $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete ${name}?`,
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
</script>
@endsection

  

