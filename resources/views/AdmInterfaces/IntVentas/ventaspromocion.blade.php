@extends('layouts.admin')
@section('title','Lis. Ventas Promoción')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Lis. Ventas Promoción<h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Lis. Ventas Promoción</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">	
	<div class="container-fluid">	
		<div class="row">	
			<div class="col-lg-12">
        <div class="card">
           <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" style="width:100%"  id="ventas">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">FOLIO</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Total con comisión</th>
                    <th scope="col" colspan="3">Comprador</th>
                    <th scope="col">Revisar</th>
                    <th scope="col">Comisión</th>
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
    $('#ventas').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerVentaspromocion",
        "columns": [
            {data:'folio',name:'ventas.folio'},
            {data:'fecha', displayFormat: 'dddd D MMMM YYYY',name:'ventas.fecha'},
            {data:'total', render: $.fn.dataTable.render.number( ',', '.', 2, '$' ),name:'ventas.total'},
            {data:'total_final', render: $.fn.dataTable.render.number( ',', '.', 2, '$' ),name:'ventas.total_final'},
            {data:'name',name:'users.name'},
            {data:'aPaterno',name:'users.aPaterno'},
            {data:'aMaterno',name:'users.aMaterno'},
            {data:'promos',orderable:false, searchable:false},
            {data:'ingreso',orderable:false, searchable:false}
        ],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 de 0",
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