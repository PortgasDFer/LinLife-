<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realizar Pedido</title>

    <link rel="icon" href="{{asset('recursos/favicon.ico')}}" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script> 
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
  </head>
  <body>  

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('recursos/linlife.png')}}" style="width:100px; margin:3px 0;">
      </a>
      <span class="navbar-text">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #aaa;"><i class="fas fa-sign-out-alt" style="color: #4025A6"></i> Salir
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
          </form>
      </a>
        <h3 style="margin:3px;">Pedidos</h3>
      </span>
    </div>
  </nav>
  <div class="content">
    <div class="alert alert-primary" role="alert" style="border-radius: 0px; text-align: center; background-color: #4025A6; font-size: 12px; ">
      info de LinLife
    </div>
  </div>
  <div class="container">
    <div class="row">
      @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{session('status')}}
          </div>
      @endif
      <div class="col-lg-12">
        <div class="card text-center">
          <div class="card-header bg-primary">
            <h1>¡MUCHAS GRACIAS POR SU COMPRA!</h1>
          </div>
          <div class="card-body">
            <p class="card-text"><i class="fa fa-smile-o fa-5x" aria-hidden="true"></i></p>
            <p class="card-text">¿Qué sigue?. Nuestro sistema ha procesado su pedido, a la brevedad nos pondremos en contacto vía correo electronico para proporcionarle la guía de rastreo, su paquete llegará al domicilio que selecciono.</p>
            <p>Puede comprobar el status de su pedido en sus compras</p>
            <a href="/historial" class="btn btn-primary">Ir a mis compras</a>
          </div>
          <div class="card-footer text-muted">
            El equipo de LinLife
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  @include('sweetalert::alert')
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

  <script src="{{asset('https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
  <script src="{{asset('js/pedidos.js')}}"></script>

  </body>
</html>
