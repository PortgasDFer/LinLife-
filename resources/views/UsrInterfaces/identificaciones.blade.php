@extends('layouts.admin')
@section('title','Subir identificación')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lin Life - Subir identificación </h1>
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
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Frente</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <form action="/guardarine/{{Auth::user()->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
          <div class="col-sm-2">
            &nbsp;
          </div>
          <div class="col-sm-4">
            @if(Auth::user()->frente!=null)                                    
              <img src="/identificaciones/{{Auth::user()->frente}}.webp" style="width:260px;"/>
            @else              
              <img src="https://static.vecteezy.com/system/resources/thumbnails/002/165/416/small/line-icon-for-identity-vector.jpg" style="width: 140px;">
              @endif            
          </div>
          <div class="col-sm-4">
            <div class="form-group">                  
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="frente" name="frente" lang="es">
                  <label class="custom-file-label" for="exampleInputFile">Seleccionar Archivo</label>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-warning btn-block btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Cargar</button>
            </div>
          </div>                  
        </div> 
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
       Carga la fotografía de tu credencial IFE/INE de <strong>frente</strong>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Reverso</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <form action="/guardarineReverso/{{Auth::user()->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group row">
          <div class="col-sm-2">
            &nbsp;
          </div>
          <div class="col-sm-4">

             @if(Auth::user()->atras!=null)                      
              <img src="/identificaciones/{{Auth::user()->atras}}.webp" style="width: 260px;"/>
            @else
              <img src="https://www.vippng.com/png/full/190-1906997_tarjetas-de-identificacin-graphics.png" alt="example placeholder avatar" style="width: 140px;">
              @endif     
          </div>
          <div class="col-sm-4">
            <div class="form-group">                  
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="atras" name="atras">
                  <label class="custom-file-label" for="exampleInputFile">Seleccionar Archivo</label>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-warning btn-block btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Cargar</button>
            </div>
          </div>
        </div> 
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
       Carga la fotografía de tu credencial IFE/INE de <strong>reverso</strong>
    </div>
  </div>
</section>
@section('scripts')
  <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <script>  
      $(function () {
        bsCustomFileInput.init();
      });  
  </script>
@endsection

@endsection