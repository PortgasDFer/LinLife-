@extends('layouts.admin')
@section('title','Registrar domicilio')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lin Life - Registrar Domicilio </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item"><a href="/domicilios">Domicilios</a></li>
              <li class="breadcrumb-item active">Registrar domicilio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"> 
        <div class="col-md-12">
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
                <h3 class="card-title">Registro de domicilio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/domicilios" enctype="multipart/form-data" method="POST" name="registro">
                	@csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Sku">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Nombre">Calle</label>
                        <input type="text" name="calle" class="form-control" id="calle" placeholder="Calle" value="{{ old('calle') }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Sku">No. Exterior</label>
                        <input type="text" name="noext" class="form-control" id="noext" placeholder="No. Ext" value="{{ old('noext') }}">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="Nombre">No.Interior</label>
                        <input type="text" name="noint" class="form-control" id="noint" placeholder="No. Int" value="{{ old('noint') }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2">
                      <div class="form-group">
                        <label for="Sku">C.P.</label>
                        <input type="text" name="cp" class="form-control" id="cp" placeholder="Código Postal">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <div class="form-group">
                        <label for="Nombre">Colonia</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <label for="Nombre">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                      <div class="form-group">
                        <label for="Nombre">Estado</label>
                        <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <label for="Sku">Descripción</label>
                        <textarea name="descripcion" id="descripcion"  class="form-control" placeholder="Descripción">{{old('descripcion')}}</textarea>
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
