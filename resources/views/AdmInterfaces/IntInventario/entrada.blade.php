@extends('layouts.admin')
@section('title','Entrada de mercancia')
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
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Lin Life</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid"> 
    <div class="card">
      <div class="card-header bg-primary">
        Ingreso de productos
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
              <label for="Nombre">Seleccione el producto</label>
              <select id="tipo" name="tipo" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
              <label for="">Producto</label>
              <input type="text" class="form-control" disabled=" " value="Nombre del producto">
            </div>
          </div>
        </div>
        <div class="row bg-primary">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Cantidad en inventario</label>
              <input type="text" class="form-control" disabled=" " value="Cantidad representada numericamente">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Precio</label>
              <input type="text" class="form-control" disabled="" value="$">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Fecha del ultimo ingreso</label>
              <input type="text" class="form-control" disabled="" value="fecha en que entro mercancia por ultima vez">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Cantidad que ingresa</label>
              <input type="text" class="form-control" value="Cantidad de producto que se adquirio">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Precio nuevo</label>
              <input type="text" class="form-control" value="$">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="form-group">
              <label for="">Fecha actual</label>
              <input type="text" class="form-control" disabled="" value="23/03/2021 ">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-primary btn-block">Registrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection