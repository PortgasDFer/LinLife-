@extends('layouts.admin')
@section('title','Detalle de Compra')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detalle de Compra: {{$venta->folio}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/historial">Historial</a></li>
          <li class="breadcrumb-item active">Detalle de Compra: {{$venta->folio}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Nota:</h5>
              Esta página se ha mejorado para su impresión. Haga clic en el botón de imprimir en la parte inferior de la factura para probar.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> LinLife
                    <small class="float-right">Fecha: {{ \Carbon\Carbon::parse($venta->fecha)->format('d M, Y') }}</small>
                  </h4>
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

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="/imprimir/{{$venta->folio}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection