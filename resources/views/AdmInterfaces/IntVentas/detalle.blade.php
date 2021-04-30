@extends('layouts.admin')
@section('title','Detalles de venta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Detalle de venta  {{$venta->folio}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/promociones">Promociones</a></li>
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
						Fecha de venta: {{$venta->fecha}}
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
						      <td style="text-align: right;">$     {{number_format($d->costo*$d->cantidad, 2, '.', ',')}} </td>
						    </tr>
						    <?php $sum+= $d->costo*$d->cantidad;?>
						    @endforeach
				            <tr>
				              <td colspan="2"  style="border: none;"></td>  
				                <td class="total" style="text-align: right;">TOTAL  $</td>
				                <td style="text-align: right;">{{number_format(($sum*0.16)+($sum-($sum*0.16)), 2, '.', ',')}}</td>  
				            </tr>
						  </tbody>
						</table>
					</div>	
				</div>		
			</div>	
		</div>	
	</div>	
</div>	
@endsection