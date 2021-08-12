<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pago Exitoso</title>

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
      <a class="navbar-brand" href="/home">
        <img src="{{asset('recursos/linlife2.png')}}">
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
      LinLife
    </div>
  </div>
  <div class="container">
    <div class="row">
      @if(session('status'))
            
      @endif
      <div class="col-lg-12">
        <div class="card text-center">
          <div class="card-header bg-info">
            <center>
              <img class="img-fluid" src="{{asset('recursos/exitoso.png')}}">
                <h1>¡PAGO EXITOSO!</h1>
              </center>
            <h1>¡MUCHAS GRACIAS POR SU COMPRA!</h1>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    ¿Qué sigue?
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <blockquote>                    
                    Puede comprobar el status de su pedido en sus compras.</p><br>
                    <small><cite title="¿Qué sigue?"><a href="/historial" class="btn btn-primary">Ir a mis compras</a></cite></small>
                  </blockquote>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    WhatsApp
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body clearfix">
                  <blockquote class="quote-success">
                    <p>Ponte en contacto con nosotros mediante WhatsApp.</p>
                    <small><cite title="WhatsApp"><a href="https://wa.me/525546632792"><img src="{{asset('recursos/whatsapp.png')}}"></a></cite></small>
                  </blockquote>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div> 
            </div>           
          </div>
          <div class="card-footer text-muted">
            El equipo de Lin Life
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
