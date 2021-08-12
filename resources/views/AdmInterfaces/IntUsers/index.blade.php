@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lin Life - Usuarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
	<div class="container-fluid">
		<div class="row"> 
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{$users}}</h3>
                  <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-lime">
                <div class="inner">
                  <h3>{{$verificados}}</h3>
                  <p>Usuarios activos</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </div>
                <a href="/usuariosverificados" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div> 
		<div class="row">
			<div class="col-md-12">	
				<div class="card">	
					<div class="card-header bg-primary">Lista de usuarios</div>
					<div class="card-body">	
						<div class="table-responsive">	
							<table id="usuarios" class="table table-bordered table-striped">
								<thead>
                  <tr>
                    <th>ID</th>
                    <th colspan="3">Nombre</th>
                    <th>Telefono casa</th>
                    <th>Celular</th>
                    <th colspan="3">Acciones</th>
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
</div>
@endsection
@section('scripts')
<script>
  $(document).ready( function () {
    $('#usuarios').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerUsers",
        "columns": [
            {data:'id'},
            {data:'name',orderable:false, searchable:false},
            {data:'aPaterno',orderable:false, searchable:false},
            {data:'aMaterno',orderable:false, searchable:false},
            {data:'telcasa',orderable:false, searchable:false},
            {data:'telcel',orderable:false, searchable:false},
            {data:'edit',orderable:false, searchable:false},
            {data:'view',orderable:false,searchable:false},
            {data:'delete',orderable:false,searchable:false}
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
          "search": "Busqueda por ID:",
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
</script>
@endsection