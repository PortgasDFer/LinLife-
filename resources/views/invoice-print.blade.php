<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LinLife | Imprimir Compra</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}"> 
  <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}"> 
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> LinLife
          <small class="float-right">Fecha: {{ \Carbon\Carbon::parse($venta->fecha)->format('d M, Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        De
        <address>
          <strong>LinLife</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Teléfono: (804) 123-5432<br>
          Correo electrónico: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Para                
        <address>                 
          <strong>{{$usuario->name}} {{$usuario->aPaterno}} {{$usuario->aMaterno}}</strong><br>
          Teléfono: {{$usuario->telcasa}}<br>
          Calular: {{$usuario->telcel}}<br>
          Correo electrónico: {{$usuario->email}}<br>
          @foreach($domicilios as $d)                    
          {{$d->nombre}}: {{$d->calle}} #{{$d->noext}} {{$d->noint}}<br>
          {{$d->localidad}}, {{$d->colonia}}, <br>C.P {{$d->cp}}<br>
          @endforeach 
                                         
        </address>                  
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Folio: {{$venta->folio}}</b><br>                                
        <b>Pagado:</b> {{$venta->fecha}}<br>                  
      </div>
      <!-- /.col -->
              </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>                      
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>                                                                
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php $sum=0.0;?>
            @foreach($pedido as $p)
          <tr>                      
            <td>{{$p->nombre}}</td>
            <td>${{number_format($p->costo, 2)}}</td>
            <td>{{$p->cantidad}}</td>                      
            <td>${{number_format($p->cantidad*$p->costo, 2)}}</td>
          </tr>
          <?php $sum+= $p->costo*$p->cantidad;?>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Métodos de pago:</p>
        <img src="/recursos/paypal2.png" alt="Paypal">
      </div>
      <!-- /.col -->
      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>${{number_format($sum-($sum*0.16), 2)}}</td>
            </tr>
            <tr>
              <th>Iva</th>
              <td>${{number_format($sum*0.16, 2)}}</td>
            </tr>
            <tr>
              <th>Envío:</th>
              <td>$0.00</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>${{number_format(($sum*0.16)+($sum-($sum*0.16)), 2)}}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
