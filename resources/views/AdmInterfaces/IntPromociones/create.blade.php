@extends('layouts.admin')
@section('title','Registrar nueva promoción')
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
        <h1 class="m-0">Lin Life - Registrar nueva promoción </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/promociones">Promociones</a></li>
          <li class="breadcrumb-item active">Registrar nueva promoción</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
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
          <div class="card card-purple">
            <div class="card-header">
              <h3 class="card-title">Registro de promociones</h3>
            </div>
            <div class="card-body">
              <form action="/promociones" method="POST" > 
                @csrf
                <div class="form-group row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                      <label for="">Producto en promoción</label>
                      <select name="code" class="form-control" style="width: 100%" id="producto">
                          <option value="0">Buscar producto</option>
                          @foreach($productos as $p)
                              <option value="{{$p->code}}" >{{$p->code}} {{$p->nombre}}</option>
                          @endforeach
                      </select>
                   </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                      <label for="">Unidades</label>
                      <input type="text" name="unidades" class="form-control" value="{{old('unidades')}}">
                   </div>
                </div>
                <div class="form-group row">  
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label for="">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label for="">Costo</label>
                    <input type="text" name="costo" class="form-control" value="{{old('costo')}}">
                  </div>
                </div>
                <div class="form-group">  
                  <div class="col-lg-12"> 
                    <button class="btn btn-block btn-success" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar promoción</button>
                  </div>
                </div>   
              </form> 
            </div>  
          </div>  
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
@endsection