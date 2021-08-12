@extends('layouts.admin')
@section('title','Productos')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lin Life - Productos </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
    <div class="content">
      <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Registrar</h3>

                  <p>Nuevo producto</p>
                </div>
                <div class="icon">                  
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
                <a href="/productos/create" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$productos}}</h3>

                  <p>Productos registrados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                
                &nbsp;                &nbsp;                
              </div>
            </div>
        </div>
        <div class="row"> 
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-transparent bg-primary">
                  <h3 class="card-title">Productos</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive" >
                    <table id="productos" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                            <th>Código de producto</th>
                            <th>Nombre</th>
                            <th>Valor DIST</th>
                            <th>Público</th>
                            <th>1er</th>
                            <th>2do</th>
                            <th>3er</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
              </div>  
          </div>          
        </div>   
      </div>  
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
  $(document).ready( function () {
    $('#productos').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerProductos",
        "columns": [
            {data:'code'},
            {data:'nombre'},
            {data:'valor_dist'},
            {data:'precio_publico'},
            {data:'nivel_1'},
            {data:'nivel_2'},
            {data:'nivel_3'},
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