@extends('layouts.admin')
@section('title','Estructura de red')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Estructura de red: {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Estructura de red: {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">
  		<div class="col-lg-12">
  			<div class="card card-widget widget-user">
  				<div class="widget-user-header bg-purple">
	              <h3 class="widget-user-username">{{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</h3>
	              <h5 class="widget-user-desc">{{$domicilio->entidad}}, {{$domicilio->localidad}}</h5>
	            </div>
	            <div class="widget-user-image">
	            	@if(Auth::user()->avatar!=null)
			            <img src="/imgusers/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
			        @else
			            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="img-circle elevation-2" alt="example placeholder avatar">
			        @endif
            	</div>
            	<div class="card-footer">
	              <div class="row">
	                <div class="col-sm-6 border-right">
	                  <div class="description-block">
	                    <h5 class="description-header">{{$noInvitados}}</h5>
	                    <span class="description-text">Socios conforman tu red</span>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	                <!-- /.col -->
	                <div class="col-sm-6 border-right">
	                  <div class="description-block">
	                    <h5 class="description-header">274</h5>
	                    <span class="description-text">Compras</span>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	              </div>
	              <!-- /.row -->
	            </div>
  			</div>
  		</div>  	
    </div>
    <div class="row">
    	<div class="col-md-4">
          <div class="card">
            <div class="card-header bg-lime">
              <h3 class="card-title">Socios que he registrado</h3>
              <span class="badge badge-danger">{{$noInvitados}} Nuevos miembros registrados</span>
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
              <ul class="users-list clearfix">
                @forelse($invitados as $invitado)
                <li>
                  	@if($invitado->avatar!=null)
			            <img src="/imgusers/{{$invitado->avatar}}" class="img-circle elevation-2" alt="User Image">
			        @else
			            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="img-circle elevation-2" alt="example placeholder avatar">
			        @endif
                  <a class="users-list-name" href="#">{{$invitado->name}} {{$invitado->aPaterno}} {{$invitado->aMaterno}}</a>
                  <span class="users-list-date">{{$invitado->status_cuenta}}</span>
                </li>
                @empty
                <h3>Aún no has invitado a tús amigos</h3>
                @endforelse
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="/lista-de-red/{{Auth::user()->slug}}">Ver lista completa</a>
            </div>
            <!-- /.card-footer -->
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title">Rendimiento</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><code>{{$noInvitados}}/10 usuarios registrados</code></p>

              <div class="progress">
                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                     aria-valuenow="{{$porcentaje}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$porcentaje}}%">
                  
                </div>
              </div>
            <!-- /.card-body -->
            <span >{{$porcentaje}}% completado, registra otros ? usuarios para subir de nivel.</span>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection