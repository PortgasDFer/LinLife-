@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Productos </h1>
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
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>63</h3>
                  <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>Usuarios activos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
                    <th colspan="3">Nombre</th>
                    <th>Telefono casa</th>
                    <th>Celular</th>
                    <th colspan="">Acciones</th>
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
            {data:'name'},
            {data:'aPaterno'},
            {data:'aMaterno'},
            {data:'created_at'},
            {data:'telcasa'},
            {data:'telcel'},
            {data:'edit',orderable:false, searchable:false}
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
</script>
@endsection