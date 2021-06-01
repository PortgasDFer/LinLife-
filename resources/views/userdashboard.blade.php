@extends('layouts.admin')
@section('title','Usuario - Dashboard')
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
      @if(Auth::user()->frente==null and Auth::user()->atras==null)
      <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible progress-bar-striped">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> ¡ATENCIÓN!</h5>
          Debes confirmar tu identidad escaneando o subiendo una fotografía de tu identificación oficial.
          <a href="/subir-identificacion"><button class="btn btn-primary">Subir identificación</button></a>
        </div> 
      </div>
      @elseif(Auth::user()->status_cuenta="PENDIENTE")
      <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> ¡ATENCIÓN!</h5>
         Tú cuenta ha sido aprobada.  Invita a tus amigos a registrarse con el código <span class="bg-primary">{{Auth::user()->code}}</span>, y comienza a generar ingresos con LinLife. 
        </div> 
      </div>
      @endif
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>${{number_format($ingresos, 2, '.', ',')}}</h3>

            <p>Mis ingresos</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            Más Información <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">{{Auth::user()->name}} {{Auth::user()->aPaterno}} {{Auth::user()->aMaterno}}</h3>
            <h5 class="widget-user-desc">{{$domicilio->localidad}}, {{$domicilio->entidad}}</h5>
          </div>
          <div class="widget-user-image">
            @if(Auth::user()->avatar!=null)                      
              <img src="/imgusers/{{Auth::user()->avatar}}"  class="img-circle elevation-2">
            @else
              <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"  class="img-circle elevation-2" alt="example placeholder avatar">
              @endif
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{$invitados}}</h5>
                  <span class="description-text">Socios</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{$ventas}}</h5>
                  <span class="description-text">Compras</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">0</h5>
                  <span class="description-text">Comisiones</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Bono de productividad</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            $0.00 
          </div>
          <div class="card-footer"> 
              Activa tu cuenta para comenzar
          </div>  
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!--ROW2-->
    <div class="row"> 
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Tus compras</h3>

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
                  <th>Fecha</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @forelse($ventas_tabla as $ventas)
                  <tr>
                    <td>{{$ventas->folio}}</td>
                    <td>{{$ventas->fecha}}</td>
                    <td>{{$ventas->total}}</td>
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
            <a href="/historial" class="btn btn-sm btn-secondary float-right">Ver todas mis compras</a>
          </div>
          <!-- /.card-footer -->
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card mb-2 bg-gradient-dark">
          <img class="card-img-top" src="recursos/Nutricion-lamina.png" alt="Dist Photo 1">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-primary text-white">Card Title</h5>
            <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
            <a href="#" class="text-white">Last update 2 mins ago</a>
          </div>
        </div>
      </div>
    </div>  
    <!--/ROW2-->    
  </div>

</section>

@endsection