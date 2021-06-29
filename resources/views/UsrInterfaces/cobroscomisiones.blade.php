@extends('layouts.admin')
@section('title','Cobro sobre comisiones')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Inicio </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Lin Life</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
	            <div class="card">
	              <div class="card-header bg-primary">
	                <i class="fas fa-hand-holding-usd"></i> RETENCIÓN DE PAGOS PARA ACUMULACIÓN DE COMISIONES PARA {{Auth::user()->name}} {{Auth::user()->aPaterno}} {{Auth::user()->aMaterno}}
	              </div>
	              <div class="card-body">
	                <div class="row">
	                  <div class="col-xs-12 col-md-6 d-flex p-2">
	                   <i class="fas fa-exclamation-triangle"></i> <p> La retención de pagos es una herramienta que nos sirve para agrupar el total de nuestras comisiones y de este modo lograr las cantidades necesarias que requiere la calificación automática.<br>En caso de no lograr la calificación, el total de pagos acumulados será transferido en el primer corte del mes siguiente</p>
	                  </div>
	                  <div class="col-xs-12 col-md-6">
	                    <div class="alert alert-secondary" role="alert">
	                      USUARIO NO ACTIVADO <h1><i class="fas fa-exclamation"></i></h1>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
          	</div>
		</div>
		<div class="row">
          <div class="col-lg-12">
            <div class="alert alert-secondary" role="alert">
               <i class="fas fa-sync"></i> CARGO AUTOMÁTICO SOBRE COMISIONES PARA SOCIO {{Auth::user()->code}} <small>Opción no disponible para este usuario  </small>
            </div>
          </div>    
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div class="card">
              <div class="card-header bg-info">
                <i class="fas fa-shopping-cart"></i> Pedido
              </div>
              <div class="card-body">
                <a href="/ventas/create">
                	<h1><i class="fas fa-cart-plus"></i></h1>
                	<small>Configure un nuevo pedido</small>
                </a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="card">
              <div class="card-header bg-info">
                <i class="fas fa-shopping-cart"></i> Activación
              </div>
              <div class="card-body">
                <div class="alert alert-secondary" role="alert">
                  USUARIO NO ACTIVADO <h1><i class="fas fa-exclamation"></i></h1>
                </div>
                <small>Primero necesitas configurar tu pedido</small>
              </div>
            </div>
          </div>
        </div>
	</div>								
</div>
@endsection