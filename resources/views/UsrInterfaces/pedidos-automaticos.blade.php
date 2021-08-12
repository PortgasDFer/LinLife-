<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lin Life | Pedidos automaticos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{asset('/recursos/linlife.png')}}" style="width:100px; margin:3px 0;">
    </a>
    <span class="navbar-text">
      <a href="" style="color: #aaa;"><i class="fas fa-sign-out-alt" style="color: #4025A6"></i> Salir</a>
      <h1 style="margin:3px;">Pedido automatico</h1>
    </span>
  </div>
</nav>
<div class="content">
  <div class="alert alert-primary" role="alert" style="border-radius: 0px; text-align: center; background-color: #4025A6;">
  Lin Life
  </div>
</div>
<!-- ./wrapper -->
<div class="content">
  <div class="container">
    <form action="">
      <!--Selecciona metodo de envio-->
      <div class="card">
        <div class="card-header bg-secondary">
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="  fas fa-credit-card" aria-hidden="true"></i> Tipo de entrega</label>
            <div class="col-sm-4">
               <select id="tipo" name="tipo" class="form-control">
                <option selected>Paquetería</option>
                <option>...</option>
              </select>
            </div>
            &nbsp;
            <div class="col-sm-4">
              <select id="destino" name="destino" class="form-control">
                <option selected>Seleccione un domicilio</option>
                @foreach($domicilios as $d)
                  <option value="{{$d->id}}">{{$d->nombre}}</option>
                @endforeach
              </select>
            </div>
            &nbsp;
            <div class="col-sm-1">
              <p style="color: #aaa;">$ 0.00</p>
            </div>
          </div>
        </div>
      </div>
      <!--/Selecciona metodo de envio-->
      <!--Lugar para el envio *CARGAR APIs*-->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xs-2 col-md-2">
              <img src="https://companiesmarketcap.com/img/company-logos/256/FDX.png" alt="Imagen de la paquetería" class="img-fluid">
            </div>
            <div class="col-xs-10 col-md-5">
              Una vez confirmado el pago de tu pedido, será puesto en curso de entrega y se te proporcionará un número de guía con el que podrás rastrear el paquete desde el sitio web de FedEx.
              <p>
                <button class="btn btn-lg bg-warning">0g</button> Envío: 1 Paquete <br> Costo por paquete: $170.00
              </p>
            </div>
            <div class="col-xs-12 col-md-5">
              Domicilio del usuario: {{Auth::user()->name}} {{Auth::user()->aPaterno}} {{Auth::user()->aMaterno}} <br>
              Calle <br>
              Colonia <br>
              Codigo Postal <br>
              Ciudad <br>
            </div>
          </div>
        </div>
      </div>
      <!--/Lugar para el envio *CARGAR APIs-->
      <!---->
      <div class="form-group row">
        <div class="col-lg-4">
          <img src="https://64.media.tumblr.com/4500aac2869c2d6c9cd1e042e9f8ac67/tumblr_pf1xbcWc3E1w0po92_500.jpg" class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width: 80px;">
          <strong>Usuario Registrado</strong><br>
          <span class="badge badge-dark"> 52828</span>
          <span class="badge badge-dark"> Socio</span>
        </div>
        <div class="col-lg-8">
          <div class="alert alert-secondary" role="alert">
            <!--Manipular esto vía JS-->
                <h1><i class="fas fa-sync"></i> Pedido vacio</h1>  </small>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-4 d-flex mb-2">
          <p>
            Configuración de pedido para calificación automática por acumulación de comisiones
          </p>
        </div>
        <div class="col-lg-5">
          <button class="btn btn-lg btn-block bg-primary">Agregar productos</button>
        </div>
        <div class="col-lg-3">
          Puntos  <span class="badge badge-dark"> 0</span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-12"> 
          <h1 class="float-right"><small>Total</small> $0.00</h1>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6">
           <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black;font-size: 12px; ">
            <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red"></i>   Si deseas solicitar factura electrónica por tu compra, necesitas proporcionar los datos de facturación requeridos en tu oficina virtual BENELEIT
          </div>
        </div>
        &nbsp;
        <div class="col-sm-4">
          <button type="button" class="btn btn-success btn-lg btn-block float-right">Grabar y salir</button>
        </div>
        <div class="col-sm-4">
           <a href="" style="color: black;"><i class="fas fa-book"></i> Aviso de privacidad</a>&nbsp;|&nbsp; 
           <a href="" style="color: black;"><i class="fas fa-book"></i>  Políticas de devolución</a>
        </div>        
      </div>
      <!---->
    </form>
  </div>
</div>
  
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>

</body>
</html>
