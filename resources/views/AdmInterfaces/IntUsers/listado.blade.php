@extends('layouts.admin')
@section('title','Lista de red')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Lista de red: {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Lista de red: {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="card">
	      		<div class="card-header bg-info">
	      			LISTA DE ASOCIADOS QUE CONFORMAN SU RED
	      		</div>
	      		<div class="card-body p-0">
	      			<div class="table-responsive">
	      				<table class="table table-hover" style="width:100%">
	      					<thead>
			                    <tr>
			                      <th>Estado</th>
			                      <th>Nombre</th>
			                      <th>Ubicación</th>
			                      <th>Numero de casa</th>
			                      <th>Numero de celular</th>
			                      <th>Correo electronico</th>
			                      <th>Fecha de nacimiento</th>
			                    </tr>
			                </thead>
			                <tbody>
	      					@forelse($invitados as $invitado)
	      						<tr>
			                      <td>{{$invitado->status_cuenta}}</td>
			                      <td>{{$invitado->name}} {{$invitado->aPaterno}} {{$invitado->aMaterno}}</td>
			                      <td>{{$invitado->localidad}}, {{$invitado->entidad}}</td>
			                      <td>{{$invitado->telcasa}}</td>
			                      <td>{{$invitado->telcel}}</td>
			                      <td>{{$invitado->email}}</td>
			                      <td>{{$invitado->fechanac}}</td>
			                    </tr>
			      			@empty
			      			<tr><h4> No hay usuarios registrados. </h4></tr>
			      				
			      			@endforelse
	      				</tbody>
	      				</table>
	      				
	      			</div>
	      			
	      		</div>
      		</div>
    	</div>
    </div>
</div>
@endsection