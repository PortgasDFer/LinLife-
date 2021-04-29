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
    <form name="formulario1">
      <div class="form-group row">
        <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="  fas fa-credit-card" aria-hidden="true"></i> Tipo de entrega</label>
        <div class="col-sm-4">
           <select name="entrega" onchange="cambia()" class="form-control">
              <option value="0">Selecciona...</option>
              <option value="1">DHL</option>
              <option value="2">Fedex</option>
              <option value="3">UPS</option>
            </select>
        </div>
        &nbsp;
        <div class="col-sm-4">
          <select id="opt" name="opt" class="form-control">
            <option selected>Selecciona...</option>
          </select>
        </div>        
        <div class="col-sm-1 text-right">
          <p style="color: #aaa;">$ 0.00</p>
        </div>
      </div>
      <div class="form-group row">
        <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="  fas fa-credit-card" aria-hidden="true"></i> Método de pago</label>
        <div class="col-sm-4">
           <select id="tipo" name="tipo" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
        <div class="col-sm-11 text-right">
          <p style="color: #aaa;">$ 0.00</p>
        </div>
      </div>
      <hr>
      <div class="form-group row">
        <br>
        <div class="col-sm-1">            
          @if($usuario->avatar!=null)                      
            <img src="/imgusers/{{$usuario->avatar}}" class="rounded-circle z-depth-1-half avatar-pic" style="width: 70px;"/>
          @else
            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width: 70px;">
            @endif
        </div>
        <div class="col-sm-3 text-align center">                      
          <p style="font-size: 12px;"><strong>{{$usuario->name}}</strong> {{$usuario->aPaterno}} {{$usuario->aMaterno}}<br>
          <span class="badge badge-dark" style="font-size: 12px;"> {{$usuario->invitacion}}</span><br><i class="fa fa-user" aria-hidden="true"></i> Titular del pedido <br>
          Compra aplica en
          <select id="compra" name="compra" class="form-control" style="width: 100px; height: 20px;">
            <option value="cargar_entrega();">Selecciona...</option>
            <option>...</option>
          </select>
          </p>
        </div>
        <div class="col-sm-7">          
          <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black;font-size: 22px; border-color: #E4E4E4;">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Pedido vacío
          </div>
        </div>
        <div class="col-md-2 offset-md-4">
          <button type="button" class="btn btn-success btn-sm btn-block" style="background-color: #4025A6; border-color: #4025A6;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Productos</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/dvp" method="POST" name="producto" id="agregar">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Code</label>
                      <input type="input" class="form-control pull-right" name="folio" id="folio" readonly="" value="">
                      <input type="hidden" value="" name="fecha">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Buscar Producto</label>
                      <select id="idcliente" name="codebar" class="form-control pull-right" style="width: 100%" autofocus="" onchange="obtener_datos(this.value)">
                        <option value="0">Buscar producto</option>
                        
                            <option value=""></option>
                        
                      </select> 
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" style="background-color: #4025A6; border-color: #4025A6;">Agregar</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-md-2 offset-md-4">                 
          <p style="font-size: 14px;">Puntos BIEX <span class="badge badge-dark">0.0</span></p>
        </div> 
        <div class="col-md-6 offset-md-4">                 
          <p style="font-size: 14px; color: red;">Antes de elegir productos, debes seleccionar las opciones de entrega y método de pago</p>
        </div>        
        <div class="col-md-4 offset-md-7">                 
          <h5 style="text-align: right;">Subtotal de productos <strong>$ 0.00</strong></h5>
        </div> 
        <div class="col-md-4 offset-md-7">                 
          <h1 style="text-align: right;">Total <strong>$ 0.00</strong></h1>
        </div>              
      </div>
      <div class="form-group row">
        <div class="col-sm-7">
           <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black;font-size: 12px; border-color: #E4E4E4;">
            <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red;"></i>   Si deseas solicitar factura electrónica por tu compra, necesitas proporcionar los datos de facturación requeridos en tu oficina virtual BENELEIT
          </div>
        </div>
        &nbsp;
        <div class="col-sm-4">
          <button type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-check" aria-hidden="true"></i> Finalizar Pedido</button>
        </div>
        <div class="col-sm-4">
           <a href="" style="color: black;"><i class="fas fa-book"></i> Aviso de privacidad</a>&nbsp;|&nbsp; 
           <a href="" style="color: black;"><i class="fas fa-book"></i>  Políticas de devolución</a>
        </div>        
      </div>
    </form>
  </div>





  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <script src="{{asset('js/pedidos.js')}}"></script>
  </body>
</html>