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
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  </head>
  <body>  

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/recursos/linlife.png" style="width:100px; margin:3px 0;">
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
    <form action="/ventas" method="POST">
      @csrf
      <div class="mb-3">
        <input type="hidden" class="form-control" id="folio" name="folio" value="{{$nuevofolio}}" readonly="">
      <div class="mb-3">
        <input type="hidden" class="form-control" id="fecha" name="fecha" readonly="" value="{{$fechaactual}}">
      </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Configura tu pedido de promociones haciendo click aquí</button>
    </form>
  </div>
  <div class="container-fluid"> 

  </div>
  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="{{asset('js/pedidos.js')}}"></script>


<script language="javascript">
   function obtener_datos(code) {
      var img = document.getElementById("myimage");
      
      var img_dir = "/productoimg/";
      $.get('/obtenerProducto/' + code, function (data) {
        console.log(data);
        if (img) {
          img.src = img_dir+data.imagen;
        }
        costo=data.precio_publico;              
        document.productos.precio.value=costo;        
      })
    }
</script>
  </body>
</html>
