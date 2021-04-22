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
      @if(Auth::user()->frente==null and Auth::user()->atras==null)
      <div class="col-lg-12">
        <div class="alert alert-warning alert-dismissible progress-bar-striped">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> ¡ATENCIÓN!</h5>
          Debes confirmar tu identidad escaneando o subiendo una fotografía de tu identificación oficial.
          <a href="/subir-identificacion"><button class="btn btn-primary">Subir identificación</button></a>
        </div> 
      </div>
      @endif
    </div>
  </div>
</section>

@endsection