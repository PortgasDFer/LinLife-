@extends('layouts.admin')
@section('title','Detalles de venta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lin Life - Detalle de venta  {{$venta->folio}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/listado-de-ventas">Ventas</a></li>
          <li class="breadcrumb-item active">Detalle venta {{$venta->folio}}</li>
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
					<div class="card-header bg-primary">	
						Folio de venta: {{$venta->folio}}
						<hr>	
						Fecha de venta: {{ \Carbon\Carbon::parse($venta->fecha)->format('d-m-Y') }}
					</div>
					<div class="card-body">	
						Compra realizada por: {{$asociado->name}} {{$asociado->aPaterno}} {{$asociado->aMaterno}}
						<hr>	
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Producto</th>
						      <th scope="col">Cantidad</th>
						      <th scope="col">Costo</th>
						      <th style="text-align: right;">Total</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $sum=0.0;?>
						  	@foreach($detalle as $d)
						    <tr>
						      <td>{{$d->nombre}}</td>
						      <td>{{$d->cantidad}}</td>
						      <td>${{number_format($d->costo, 2, '.', ',')}}</td>
						      <td style="text-align: right;">${{number_format($d->costo*$d->cantidad, 2, '.', ',')}} </td>
						    </tr>
						    <?php $sum+= $d->costo*$d->cantidad;?>
						    @endforeach
				            <tr>
				              <td colspan="2"  style="border: none;"></td>  
				                <td class="total" style="text-align: right;">TOTAL</td>
				                <td style="text-align: right;">${{number_format(($sum*0.16)+($sum-($sum*0.16)), 2, '.', ',')}}</td>  
				            </tr>
						  </tbody>
						</table>
						<hr>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 justify-content-center">
								<center>
								Esta compra genera comisi??n para el lider de venta: <br>&nbsp;
								
									<strong>{{$liderVenta->name}} {{$liderVenta->aPaterno}} {{$liderVenta->aMaterno}}</strong> <br>&nbsp;
									@if($liderVenta->avatar!=null)
									&nbsp;
	          				<img src="/imgusers/{{$liderVenta->avatar}}" style="width: 120px; border-radius: 20px;" class="img-fluid"> 
	          				&nbsp;
	        				@else
	        				&nbsp;
	          				<img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" style="width: 70px; border-radius: 20px;" class="img-fluid">
	          				&nbsp;
	        				@endif
	        			</center>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<form action="/asignarComision/{{$venta->folio}}" method="POST">
									@csrf
									<div class="form-group row">
										<label for="">Porcentaje de comisi??n</label>
										<div class="col-sm-12">
											<input type="text" id="porcentaje" name="porcentaje" class="form-control">
											<input type="hidden" id="total" value="{{($sum*0.16)+($sum-($sum*0.16))}}">
											<input type="hidden" name="id_user" value="{{$liderVenta->id}}">
										</div>
									</div>
									<div class="form-group row">
										<label for="">Total comisi??n</label>
										<div class="col-sm-12">
											<input type="text" name="cantidad" id="cantidad" class="form-control" readonly="">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<button type="button" class="btn btn-block btn-warning" onclick="calcular_porcentaje(porcentaje.value)">Calcular comisi??n</button>
										</div>
										<div class="col-sm-6">
											<button type="submit" disabled="" class="btn btn-block btn-success" id="asignar">Asignar comisi??n</button>
										</div>
									</div>
								</form>
							</div>
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
	var campoComision=document.getElementById('cantidad');
	const total=document.getElementById('total').value;
	var botonSubmit=document.getElementById('asignar');
	console.log(total);

	function calcular_porcentaje(porcentaje){
		let porcentajeReal = porcentaje*total; 
		let comision=porcentajeReal/100;
		campoComision.value="$"+comision;
		console.log(comision);
		botonSubmit.disabled=false;

		//
	}
</script>
@endsection