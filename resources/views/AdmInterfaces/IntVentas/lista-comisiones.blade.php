@extends('layouts.admin')
@section('title','Listado de comisiones')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Listado de comisiones por usuario<h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Listado de comisiones por usuario</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">	
	<div class="container-fluid">	
		<div class="row">	
			<div class="col-lg-12">
        <div class="card">
           <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" style="width:100%" id="ventas">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID </th>
                    <th scope="col" colspan="3">Nombre</th>
                    <th scope="col">Total Comisión del mes</th>
                    <th scope="col" colspan="2">Acciones</th>
                  </tr>
                </thead>
                @foreach($usuariosComision as $usuario)
                  <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->aPaterno}}</td>
                    <td>{{$usuario->aMaterno}}</td>
                    <td>{{$usuario->comision_total}}</td>
                    <td><a href="/revisar-pago-comision/{{$usuario->slug}}"><button class="btn btn-success">Revisar</button></a></td>
                    <td><button class="btn btn-primary">Otra acción</button></td>
                  </tr>
                @endforeach
                <tbody>
                </tbody>
              </table>
              {{ $usuariosComision->links() }}
            </div>	
          </div>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection
@section('scripts')
@endsection