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
      Lin Life
    </div>
  </div>
  <div class="container">
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
          <span class="badge badge-dark" style="font-size: 12px;"> {{$usuario->code}}</span><br><i class="fa fa-user" aria-hidden="true"></i> Titular del pedido <br>
          <!--Compra aplica en
          <select id="compra" name="compra" class="form-control" style="width: 100px; height: 20px;">
            <option value="cargar_entrega();">Selecciona...</option>
            <option>...</option>
          </select>-->
          </p>
        </div>
        <div class="col-sm-7">          
          <div class="table-responsive">
            <table class="table border" id="">
              <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Remover</th>
                  </tr>
              </thead>            
              <tbody>
                <?php $comision=0.0?>
                <?php $sum=0.0;?>
                @if(count($tabla)>0)
                @foreach($tabla as $t)
                <tr>
                <td>{{$t->nombre}}</td>
                <td>{{$t->cantidad}}</td>
                <td>${{number_format($t->costo, 2, '.', ',')}}</td>
                <td>${{number_format($t->cantidad*$t->costo, 2, '.', ',')}}</td>
                <td> 
                  <form action="/pedidos/{{$t->id}}" method="POST">
                      @csrf 
                      @method('DELETE')
                      <input type="hidden" name="folio" value="{{$datos->folio}}">
                      <input type="hidden" name="code" value="{{$t->code}}">
                      <button class="btn btn-warning" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </td>
                </tr>
                <?php $sum+= $t->costo*$t->cantidad;?>
                @endforeach
                <?php $comision=($sum/100)*4.9?>
                @else
                <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black;font-size: 22px; border-color: #E4E4E4;">
                  <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Pedido vacío
                </div>
                @endif                                                        
              </tbody>
            </table>
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
                  <form action="/pedidos" method="POST" name="productos" id="agregar">
                    @csrf
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Folio</label><br>
                      <center>
                        <input type="input" class="form-control pull-right" name="folio" id="folio" readonly="" value="{{$datos->folio}}">                        
                      </center>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Buscar Producto</label>
                      <select id="code" name="code" class="form-control pull-right js-example-basic-single" onchange="obtener_datos(this.value)">
                        <option value="0">Selecciona</option>
                        @foreach($productos as $p)                          
                          <option value="{{$p->code}}">{{$p->code}} - {{$p->nombre}}</option>
                        @endforeach>                        
                      </select> 
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Imagen del Producto</label><br>
                      <center>
                        <img src="/productoimg/cargando.gif" alt="" class="img-fluid" id="myimage" width="100">
                      </center>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Precio</label><br>
                      <center>
                        <input type="input" class="form-control pull-right" name="precio" id="precio" readonly="">
                      </center>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Cantidad</label><br>
                      <center>
                        <input type="input" class="form-control pull-right" name="cantidad" id="cantidad">
                      </center>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #4025A6; border-color: #4025A6;">Agregar</button>  
                    </form>                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                              
                </div>
                </div>
              </div>
            </div>
        </div> 

        <div class="col-md-2 offset-md-4">                 
          <p style="font-size: 14px;">Puntos <span class="badge badge-dark">0.0</span></p>
        </div>     
        <div class="col-md-6 offset-md-4">                 
          <p style="font-size: 14px; color: red; text-align: left;">Antes de elegir productos, debes seleccionar las opciones de entrega y método de pago</p>
        </div>        
        <div class="col-md-4 offset-md-7">                 
          <h5 style="text-align: right;">Subtotal de productos <strong>$ {{number_format($sum, 2, '.', ',')}}</strong></h5>
        </div> 
        <div class="col-md-4 offset-md-7">                 
          <h5 style="text-align: right;">Comisión PayPal <strong>$ {{number_format($comision+4, 2, '.', ',')}}</strong></h5>
        </div> 
        <div class="col-md-4 offset-md-7">                 
          <h1 style="text-align: right;">Total <strong>$ {{number_format($sum + $comision+4, 2, '.', ',')}}</strong></h1>
        </div>                   
      </div>
      <div class="form-group row">
        <div class="col-sm-7">
           <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black;font-size: 12px; border-color: #E4E4E4;">
            <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: red;"></i>   Si deseas solicitar factura electrónica por tu compra, necesitas proporcionar los datos de facturación requeridos en tu oficina virtual LinLife
          </div>
        </div>
        &nbsp;
        <div class="col-sm-4">
          <form action="/pay/{{$datos->folio}}" method="POST">
            @csrf
            <input type="hidden" name="monto" value="{{$sum+$comision+4}}" >
            <input type="hidden" name="folio" value="{{$datos->folio}}">
            <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-check" aria-hidden="true"></i> Finalizar Pedido</button>
          </form>
        </div>
        &nbsp;
        <div class="col-sm-4">
           <a href="" style="color: black;"><i class="fas fa-book"></i> Aviso de privacidad</a>&nbsp;|&nbsp; 
           <a href="" style="color: black;"><i class="fas fa-book"></i>  Políticas de devolución</a>
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

  <script language="javascript">
   function obtener_datos(code) {
      var img = document.getElementById("myimage");
      
      var img_dir = "/productoimg/";
      console.log(code);
      $.get('/obtenerProducto/' + code, function (data) {
        console.log(data);
        if (img) {
          img.src = img_dir+data.imagen;
        }
                     
        let precio=document.getElementById("precio");
        precio.value=data.precio_publico;       
      })
    }
</script>
  </body>
</html>
