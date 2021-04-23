@extends('layouts.admin')
@section('title','Subir identificación')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Subir identificación </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Subir identificación</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-12">
    			<div class="card">
    				<div class="card-header bg-purple">
    					SUBIR IDENTIFICACIÓN
    				</div>
    				<div class="card-body">
    					<p>Tome una foto o escaneé su identificación por ambos lados y adjuntela en formato .jpg o .png</p>
    					<form action="/guardarine/{{Auth::user()->slug}}" enctype="multipart/form-data" method="POST">
                @csrf
    						<div class="form-group row">
    							<div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="">INE frente</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="frente">
                      <label class="custom-file-label" for="customFileLang">Frente</label>
                    </div>      
                  </div>
    							<div class="col-xs-12 col-sm-12 col-md-4">
                    <label for="">INE reverso</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="atras">
                      <label class="custom-file-label" for="customFileLang">Atras</label>
                    </div>       
                  </div>
    							<div class="col-xs-12 col-sm-12 col-md-4"><button class="btn btn-lg btn-block bg-purple" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar identificaciones</button></div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>	
    </div>
</section>
@endsection