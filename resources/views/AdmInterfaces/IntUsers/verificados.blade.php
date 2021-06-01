@extends('layouts.admin')
@section('title','Usuarios Verificados')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Usuarios Verificados</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Usuarios Verificados</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <!-- small box -->
        <div class="small-box bg-lime">
          <div class="inner">
            <h3>{{$Noverificados}}</h3>
            <p>Usuarios verificados</p>
          </div>
          <div class="icon">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          </div>
          <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{$pendientes}}</h3>
              <p>Pendientes de verificación</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-times" aria-hidden="true"></i>
            </div>
            <a href="/validar-identidades" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header bg-green">
            USUARIOS VERIFICADOS
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-lime">
                  <tr>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Colonia</th>
                    <th scope="col">Ver</th>
                  </tr>
                  </thead>
                  @forelse($verificados as $user)
                    <tr>
                      <td>{{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</td>
                      <td>{{$user->localidad}}</td>
                      <td>{{$user->entidad}}</td>
                      <td>{{$user->colonia}}</td>
                      <td>
                        <a href="/usuarioverificado/{{$user->slug}}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                      </td>
                    </tr>
                  @empty
                    <h1>No hay usuarios verificados</h1>
                  @endforelse
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection