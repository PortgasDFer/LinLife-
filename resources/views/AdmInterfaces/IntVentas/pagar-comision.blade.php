@extends('layouts.admin')
@section('title','Pagar comisión')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Pagar comisión</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/lista-comisiones">Lista comisiones</a></li>
          <li class="breadcrumb-item active">Pagar comisión {{$liderVenta->name}} {{$liderVenta->aPaterno}} {{$liderVenta->aMaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="card">
				<div class="card-header bg-purple">
					Ventas que generaron comisión para este usuario
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="ventas">
							<thead>
								<tr>
									<th>FOLIO</th>
									<th>FECHA</th>
									<th>PORCENTAJE</th>
									<th>MONTO COMISIÓN</th>
									<th>REVISAR VENTA</th>
								</tr>
							</thead>
							<tbody>
								@foreach($comisiones as $comision)
									<tr>
										<td>{{$comision->folio_venta}}</td>
										<td>{{$comision->fecha}}</td>
										<td>{{$comision->porcentaje}}%</td>
										<td>${{number_format($comision->total_comision, 2)}}</td>
										<td><a href="/pedido/{{$comision->folio_venta}}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
									</tr>
								@endforeach
							</tbody>
						</table>											
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/imgusers/{{$liderVenta->avatar}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$liderVenta->name}} {{$liderVenta->aPaterno}} {{$liderVenta->aMaterno}}</h3>

                <p class="text-muted text-center">{{$domicilio->localidad}}, {{$domicilio->entidad}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Periodo</b> <a class="float-right">{{$dt->startOfMonth()->format('d/m/Y')}} al {{$dt->endOfMonth()->format('d/m/Y')}}</a>
                  </li>
                  <li class="list-group-item">
                  	<b>Datos personales</b>
                  	<hr>
                  	<b>Nombre</b>  <a class="float-right">{{$liderVenta->name}} {{$liderVenta->aPaterno}} {{$liderVenta->aMaterno}}</a><br>
                  	<b>Correo</b>	 <a class="float-right">{{$liderVenta->email}}</a> <br>
                  	<b>Telefono celular</b> <a class="float-right">{{$liderVenta->telcel}}</a> 
                  </li>
                  <li class="list-group-item">
                    <b>Datos bancarios</b> 
                    <hr>
                    <b>Banco</b> {{$liderVenta->banco}}<br>
                    <b>Número de tarjeta</b> <a class="float-right">{{$liderVenta->clabe}}</a> <br>
                    <b>Beneficiario</b> <a class="float-right">{{$liderVenta->beneficiario}}</a> <br>
                  </li>
                  <li class="list-group-item">
                    <b>Total </b> <h2><a class="float-right">${{number_format($totalComisiones, 2)}}MXN</a></h2>
                  </li>
                </ul>

                <a href="https://www.paypal.com/myaccount/transfer/homepage" target="_blank" class="btn btn-primary btn-block"><b>Ir a PayPal</b></a>
              </div>
              <!-- /.card-body -->
            </div>
		</div>
	</div>
</div>						
@endsection