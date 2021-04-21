<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de nuevo socio</title>
    <link rel="icon" href="{{asset('recursos/favicon.ico')}}" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src=" http://servicios.apiqroo.com.mx/sepomex/public/js/sepomex_js/sepomex.js"></script>
  </head>
  <body>    
  <section class="bg-light">

    <div class="container">
      <a href="/usuarios">Volver</a>
      <br>
      <br>
      @if (count($errors) > 0)
        <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endif
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
      <div class="card">
        <h5 class="card-header">Editar socio {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</h5>
        <div class="card-body">
          <p style="font-size:90%;"><b>ATENCIÓN</b>. Es importante que para acceder a esta área, previamente se haya solicitado la correción de algún dato o corrección por parte de un usuario, de lo contrarrio no deberá modificar algún dato del socio.</p>
          <form method="POST" action="/usuarios/{{$user->id}}" enctype="multipart/form-data" name="registro">
            @csrf
            @method('PUT')
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$user->name}}">
              </div>
              <div class="form-group col-md-4">
                <label>Apellido Paterno</label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno" value="{{$user->aPaterno}}">
              </div>
              <div class="form-group col-md-4">
                <label>Apellido Materno</label>
                <input type="text" class="form-control" id="amaterno" name="amaterno" placeholder="Apellido Materno" value="{{$user->aMaterno}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="{{$user->email}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Sexo</label>
                <br>
                <input type="checkbox" checked data-toggle="toggle" data-on="H" data-off="M" data-onstyle="success" data-offstyle="warning" name="sexo"> 
                <p style="font-size:80%;">H (Hombre) <br> M (Mujer)</p>                   
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="{{$domicilio->calle}}">
              </div>
              <div class="form-group col-md-1">
                <label>No. Ext.</label>
                <input type="text" class="form-control" id="ext" name="ext" placeholder="No. Ext." value="{{$domicilio->noext}}">
              </div>
              <div class="form-group col-md-1">
                <label>No. Int.</label>
                <input type="text" class="form-control" id="int" name="int" placeholder="No. Int." value="{{$domicilio->noint}}">
              </div>
              <div class="form-group col-md-4">
                <label>Código Postal</label>                
                <input type="text" class="form-control" id="cp" name="cp" placeholder="Código Postal" onchange="cargar_datos(this.value)" value="{{$domicilio->cp}}">
              </div>
              <div class="form-group col-md-6">
                <label>Colonia</label>
                <select id="colonia" name="colonia" class="form-control">
                  <option selected>Selecciona...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Municipio</label>
                <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad" readonly="">
              </div>
              <div class="form-group col-md-3">
                <label>Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" readonly="">
              </div>              
              <div class="form-group col-md-12">
                <label>Descripción de la ubicación</label>                
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la ubicación" value="{{$domicilio->descripcion}}">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Teléfono de Casa</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de Casa" name="telefono" value="{{$user->telcasa}}">
              </div>
              <div class="form-group col-md-3">
                <label>Teléfono Celular</label>
                <input type="text" class="form-control" id="cel" name="cel" placeholder="Teléfono Celular" value="{{$user->telcel}}">
              </div>
              <div class="form-group col-md-2">
                <label>INE</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="frente">
                  <label class="custom-file-label" for="customFileLang">Frente</label>
                </div>                
              </div>
              <div class="form-group col-md-2">
                <label><br></label>                
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="atras">
                  <label class="custom-file-label" for="customFileLang">Atras</label>
                </div>                
              </div>
              <div class="form-group col-md-2">
                <br>
                <p style="font-size:80%;">Carga fotografías de tu credencial IFE/INE por ambos lados.</p>               
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>CURP</label>
                <input type="text" name="curp" class="form-control" id="curp" name="curp" placeholder="CURP" value="{{$user->curp}}">
              </div>
              <div class="form-group col-md-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha" class="form-control" id="fecha" name="fecha" placeholder="Fecha de Nacimiento" value="{{$user->fechanac}}">
              </div>
              <div class="form-group col-md-3">
                <label>Entidad de Nacimiento</label>
                <select id="entidad" name="entidad" class="form-control">
                  <option selected>Selecciona...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Estado Civil</label>
                <select id="estado-civil" name="estado-civil" class="form-control">
                  <option selected>Selecciona...</option>
                  <option value="Soltero">Soltero</option>
                  <option value="Casado">Casado</option>
                  <option value="Unión Libre">Unión Libre</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label>Invitación</label>
                <input type="text" name="invitacion" class="form-control" id="invitacion" placeholder="Patrocinador">
              </div>
              <div class="form-group col-md-2">
                <label>Banco</label>
                <select id="banco" name="banco" class="form-control">
                  <option selected>Selecciona...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <br>
                <p style="font-size:80%;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Es MUY IMPORTANTE que registres una cuenta bancaria para recibir el pago de tus comisiones. Si lo deseas, puedes registrarla mas tarde.</p>               
              </div>
              <div class="form-group col-md-3">
                <label>Beneficiario</label>
                <input type="text" name="beneficiario" class="form-control" id="beneficiario"  placeholder="Beneficiario" name="beneficiario">
              </div>
              <div class="form-group col-md-2">
                <br>
                <p style="font-size:80%;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Escriba su nombre tal como aparece en la credencial del INE.</p>               
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Finalizar Registro</button>
          </form>
        </div>
      </div>  
    </div>
    <br>
  </section>


  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
  <!-- API sepomex -->
  <script src="{{asset('js/sepomex.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  </body>
</html>
