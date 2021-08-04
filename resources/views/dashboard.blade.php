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
            <a href="/usuarios" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="/productos" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
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
          <a href="/listado-de-ventas" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Últimas ventas</h3>
              <div class="card-tools">
                <span title="3 New Messages" class="badge badge-primary">{{$noVentas}}</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
          </div>
          <div class="card-body">
            <div class="table table-responsive" style="font-size: 15px;">
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
                      <a href="/detalle-venta/{{$v->folio}}"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>                      
                      <a href=""><button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <h5>¡Aún no hay ventas!</h5>
                  </tr>                  
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer clearfix">
            <a href="/listado-de-ventas" class="btn btn-sm btn-info float-left">Listado de Ventas</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
          <div class="card-header">            
            <h3 class="card-title">Últimas Ventas con Promociones</h3>
              <div class="card-tools">
                <span title="3 New Messages" class="badge badge-primary">{{$noVentasPromocion}}</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
          </div>
          <div class="card-body">
            <div class="table table-responsive" style="font-size: 15px;">
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
                      <a href="/detalle-ventapromocion/{{$vp->folio}}"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>                      
                      <a href=""><button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <h5>¡Aún no hay ventas!</h5>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer clearfix">
            <a href="/listado-de-ventaspromocion" class="btn btn-sm btn-info float-left">Listado de ventas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection