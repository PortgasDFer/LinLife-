@extends('layouts.admin')
@section('title','Dashboard')
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
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Lin Life</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="alert bg-purple alert-dismissible ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> BIENVENIDO ADMINISTRADOR</h5>
          Sistema hecho para LINLIFE
        </div> 
      </div>
    </div>
  </div>
</section>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-4">
        <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$noUsuarios}}</h3>
              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="/productos/create" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-4">
        <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{$noProductos}}</h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            </div>
            <a href="/productos/create" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$noVentas}}</h3>

            <p>Ventas</p>
          </div>
          <div class="icon">
            <i class="fa fa-money" aria-hidden="true"></i>
          </div>
          <a href="/listado-de-ventas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            Últimas ventas
          </div>
          <div class="card-body">
            <div class="table table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ASOCIADO</th>
                    <th>ESTADO</th>
                    <th>MONTO</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($ventas as $v)
                  <tr>
                    <td>{{$v->folio}}</td>
                    <td>{{$v->fecha}}</td>
                    <td>{{$v->name}} {{$v->aPaterno}} {{$v->aMaterno}}</td>
                    <td>{{$v->estado}}</td>
                    <td>${{$v->total}}</td>
                    <td>
                      <a href="/detalle-venta/{{$v->folio}}"><button class="btn btn-primary">Detalles</button></a>
                      <a href=""><button class="btn btn-warning">Eliminar</button></a>
                    </td>
                  </tr>
                  @empty
                  ¡Aún no hay ventas!
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            Últimas Ventas con Promociones
          </div>
          <div class="card-body">
            <div class="table table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ASOCIADO</th>
                    <th>ESTADO</th>
                    <th>MONTO</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($ventas_promocion as $vp)
                  <tr>
                    <td>{{$vp->folio}}</td>
                    <td>{{$vp->fecha}}</td>
                    <td>{{$vp->name}} {{$vp->aPaterno}} {{$vp->aMaterno}}</td>
                    <td>{{$vp->estado}}</td>
                    <td>${{$vp->total}}</td>
                    <td>
                      <a href="/detalle-ventapromocion/{{$vp->folio}}"><button class="btn btn-primary">Detalles</button></a>
                      <a href=""><button class="btn btn-warning">Eliminar</button></a>
                    </td>
                  </tr>
                  @empty
                  ¡Aún no hay ventas!
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection