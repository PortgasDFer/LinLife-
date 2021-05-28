@extends('layouts.admin')
@section('title','Historial de compras')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Historial de compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Historial de compras - {{Auth::user()->name}} {{Auth::user()->aPaterno}} {{Auth::user()->aMaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Últimos pedidos</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Folio</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                </tr>
                </thead>
                <tbody>
                	@forelse($ventas as $v)
                	<tr>
	                  <td><a href="#">{{$v->folio}}</a></td>
	                  <td><span class="badge badge-success">{{$v->estado}}</span></td>
	                  <td>{{$v->fecha}}</td>
	                  <td>
	                    <a href="/pedido/{{$v->folio}}"><button class="btn btn-block btn-primary">Ver</button></a>
	                  </td>
	                </tr>
                	@empty
                	<tr>
                  <td><h4>Aún no ha realizado compras</h4></td>                
                <tr>
                	@endforelse
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href="{{action('VentasController@create') }}" class="btn btn-sm btn-info float-left">Nueva compra</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection