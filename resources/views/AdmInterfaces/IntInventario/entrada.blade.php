@extends('layouts.admin')
@section('title','Entrada de mercancia')
@section('scripts-header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Ingreso Productos </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Lin Life</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid"> 
    <div class="card">
    	@if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    	@endif

    	@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    	@endif
      <div class="card-header bg-primary">
        Ingreso de productos
      </div>
      <div class="card-body">
      	<form action="/entrada" method="POST" id="inventario" name="inventario">
      		@csrf
      		<div class="row">
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="Nombre">Seleccione el producto</label>
	              <select name="code" class="form-control"  id="code" onchange="cargar_datos(this.value)">
	                  <option>Buscar producto</option>
	                  @foreach($productos as $p)
	                      <option value="{{$p->code}}" >{{$p->code}} {{$p->nombre}}</option>
	                  @endforeach
	              </select>
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Producto</label>
	              <input type="text" class="form-control" disabled=" " id="producto_nombre" value="Nombre del producto">
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Cantidad en inventario</label>
	              <input type="text" class="form-control" disabled=" " id="cantidad"   placeholder="Cantidad representada numericamente">
	            </div>
	          </div>
	        </div>
	        <div class="row bg-primary">
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Precio DIST</label>
	              <input type="text" class="form-control" disabled=" " id="dist"   placeholder="$">
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Precio al publico</label>
	              <input type="text" class="form-control" disabled="" id="precio" placeholder="$">
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Fecha del ultimo ingreso</label>
	              <input type="text" class="form-control" disabled="" id="fecha_upd" placeholder="Fecha en que entro mercancia por ultima vez">
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Cantidad que ingresa</label>
	              <input type="text" class="form-control" name="ingresa" placeholder="Cantidad de producto que se adquirio">
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="">Precio nuevo</label>
	              <input type="text"  name="precio_nuevo" class="form-control" placeholder="$">
	              <small id="passwordHelpBlock" class="form-text text-muted">*Opcional</small>
	            </div>
	          </div>
	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
	            <div class="form-group">
	              <label for="	">Valor DIST nuevo</label>
	              <input type="text" name="valor_distn" class="form-control" placeholder="$">
	              <small id="passwordHelpBlock" class="form-text text-muted">*Opcional</small>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	           <div class="col-md-6">	
	           	  <label for="">Fecha actual</label>
	              <input type="text" class="form-control" name="fecha" readonly="" value="{{$fechaactual}} ">
	           </div>	           
	          <div class="col-md-6">	          	
							<label for="">Registrar</label>  	
	            <button class="btn btn-primary btn-block"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button>
	          </div>
	        </div>
      	</form>
      </div>
    </div>
  </div>  
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2({
           width: 'resolve'
    });
});
</script>
<script language="javascript">
   function cargar_datos(code) {
      $.get('/obtenerProducto/' + code, function (data) {
        console.log(data);
      		document.inventario.producto_nombre.value=data.nombre;
      		document.inventario.cantidad.value=data.cantidad;
      		document.inventario.precio.value="$ "+data.precio_publico;
      		document.inventario.fecha_upd.value=data.created_at;
      		document.inventario.dist.value="$ "+data.valor_dist;
      })
    }
  </script>
@endsection