<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de nuevo socio</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  </head>
  <body>    
  <section class="bg-light">
    <div class="container">
      <br>
      <br>      
      <div class="card">
        <h5 class="card-header">Registro de nuevo socio</h5>
        <div class="card-body">
          <p style="font-size:90%;">Proporciona en el siguiente formulario la información que se te solicita. Es importante que la verifiques antes de enviarla. Asegurate que tus datos personales coincidan con tu documentación oficial y que tu correo electrónico y tus teléfonos esten vigentes. Solicitamos tu domicilio postal por que ahí es donde haremos llegar el envío de tus productos, promociones y regalos.</p>
          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
              </div>
              <div class="form-group col-md-4">
                <label>Apellido Paterno</label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno">
              </div>
              <div class="form-group col-md-4">
                <label>Apellido Materno</label>
                <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Apellido Materno">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-9">
                <label>Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
              </div>
              <div class="form-group col-md-1">
                <label>Sexo</label>
                <br>
                <input type="checkbox" checked data-toggle="toggle" data-on="H" data-off="M" data-onstyle="success" data-offstyle="warning" name="sexo">                
              </div>
              <div class="form-group col-md-1">
                <br>
                <p style="font-size:80%;">H (Hombre) <br> M (Mujer)</p>               
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
              </div>
              <div class="form-group col-md-1">
                <label>No. Ext.</label>
                <input type="text" class="form-control" id="ext" name="ext" placeholder="No. Ext.">
              </div>
              <div class="form-group col-md-1">
                <label>No. Int.</label>
                <input type="text" class="form-control" id="int" name="int" placeholder="No. Int." >
              </div>
              <div class="form-group col-md-4">
                <label>Código Postal</label>                
                <input type="text" class="form-control" id="cp" name="cp" placeholder="Código Postal">
              </div>
              <div class="form-group col-md-6">
                <label>Colonia</label>
                <select id="colonia" name="colonia" class="form-control">
                  <option selected>Selecciona...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Localidad</label>
                <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad" disabled="disabled">
              </div>
              <div class="form-group col-md-3">
                <label>Entidad</label>
                <input type="text" class="form-control" id="entidad" name="entidad" placeholder="Entidad" disabled="disabled">
              </div>              
              <div class="form-group col-md-12">
                <label>Descripción de la ubicación</label>                
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la ubicación">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Teléfono de Casa</label>
                <input type="text" class="form-control" id="telefono" placeholder="Teléfono de Casa" name="telefono">
              </div>
              <div class="form-group col-md-3">
                <label>Teléfono Celular</label>
                <input type="text" class="form-control" id="tel_cel" name="tel_cel" placeholder="Teléfono Celular">
              </div>
              <div class="form-group col-md-2">
                <label>INE</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                  <label class="custom-file-label" for="customFileLang">Frente</label>
                </div>                
              </div>
              <div class="form-group col-md-2">
                <label><br></label>                
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
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
                <input type="text" name="curp" class="form-control" id="curp" placeholder="CURP">
              </div>
              <div class="form-group col-md-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha de Nacimiento">
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
                <select id="estado" name="estado" class="form-control">
                  <option selected>Selecciona...</option>
                  <option>...</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label>Patrocinador</label>
                <input type="text" name="patrocinador" class="form-control" id="patrocinador" placeholder="Patrocinador">
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
                <input type="text" name="beneficiario" class="form-control" id="beneficiario" placeholder="Beneficiario">
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

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  </body>
</html>