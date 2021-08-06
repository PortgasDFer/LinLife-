@extends('layouts.admin')
@section('title','Usuario Verificado')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife -ID: {{$user->id}} {{$user->name}} {{$user->aMaterno}} {{$user->aPaterno}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/usuariosverificados">Usuarios Verificados</a></li>
          <li class="breadcrumb-item active">{{$user->name}} {{$user->aMaterno}} {{$user->aPaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
              <h3 class="widget-user-username">{{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</h3>
              <h5 class="widget-user-desc">{{$domicilio->localidad}}, {{$domicilio->entidad}}</h5>
            </div>
            <div class="widget-user-image">
              @if($user->avatar!=null)                      
              <img src="/imgusers/{{$user->avatar}}"  class="img-circle elevation-2">
            @else
              <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"  class="img-circle elevation-2" alt="example placeholder avatar">
              @endif
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <p>Datos del usuario</p>
                  {{$user->aPaterno}} {{$user->aMaterno}} {{$user->name}}
                  <br>
                  CURP: {{$user->curp}}
                </div>
                <div class="col-sm-6 border-right">
                  <p>Domicilio</p>
                  Calle: {{$domicilio->calle}} No. Ext: {{$domicilio->noext}} No int {{$domicilio->noint}}
                  <br>
                  Colonia: {{$domicilio->colonia}} C.P.:{{$domicilio->cp}}
                  <br>
                  {{$domicilio->localidad}},{{$domicilio->entidad}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <div class="card">
              <div class="card-header bg-lime">
                <h3 class="card-title">Socios que ha registrado</h3>
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
                  <h3>Aún no ha invitado a sus amigos</h3>
                  @endforelse
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="/lista-de-red-usuario/{{$user->slug}}">Ver lista completa</a>
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
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-purple">
              Sus identificaciones
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <p>Frente</p>
                  <img src="/identificaciones/{{$user->frente}}.webp" alt="" class="img-fluid">
                </div>
                <div class="col-sm-6 border-right">
                  <p>Reverso</p>
                  <img src="/identificaciones/{{$user->atras}}.webp" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <form action="/status/{{$user->slug}}" method="POST" name="validar" id="validar">
                @csrf
                <div class="form-group row">
                  <input type="hidden" id="status" name="status">
                  <div class="col-md-12 col-lg-4">
                    <button class="btn btn-primary" onclick="solicitar()" type="submit">Solicitar nuevamente INE <i class="fa fa-exclamation" aria-hidden="true"></i></button>
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
    function anular(){
      document.validar.status.value = "CANCELADA";
    }
    function solicitar(){
      document.validar.status.value = "PENDIENTE"
    }
    function aprobada(){
      document.validar.status.value = "VERIFICADO"
    }
  </script>
@endsection