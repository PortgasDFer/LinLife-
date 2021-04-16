@extends('layouts.admin')
@section('title','Registrar productos')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LinLife - Registrar Productos </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/producto">Productos</a></li>
              <li class="breadcrumb-item active">Registrar producto</li>
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
          <!-- left column -->
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro de productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/productos" enctype="multipart/form-data" method="POST">
                	@csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Sku">Código</label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Código del producto">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Nombre">Nombre del producto</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del producto">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Sku">Valor DIST</label>
                        <input type="text" name="dist" class="form-control" id="dist" placeholder="Ingrese valor de distribución">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Nombre">Precio público</label>
                        <input type="text" name="publico" class="form-control" id="publico" placeholder="Precio al público">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="Sku">Descripción</label>
                        <textarea name="descripcion" id="descripcion"  class="form-control">
                          
                        </textarea>
                      </div>
                    </div>
                  </div>
                  <p>Reparto de comisiones por nivel</p>
                  <div class="row">
                  	<div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <label for="Sku">Nivel 1</label>
                        <input type="text" name="nivel-1" class="form-control" id="nivel-1" placeholder="Nivel 1">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <label for="Sku">Nivel 2</label>
                        <input type="text" name="nivel-2" class="form-control" id="nivel-2" placeholder="Nivel 2">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <label for="Sku">Nivel 3</label>
                        <input type="text" name="nivel-3" class="form-control" id="nivel-3" placeholder="Nivel 3">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-xs-12">
                  		<div class="form-group">
                  			<label for="">Imagen del producto</label>
                  			<input type="file" class="form-control" name="imagen" id="imagen">
                  		</div>
                  	</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div>  
    </div>
    <!-- /.content -->
@endsection