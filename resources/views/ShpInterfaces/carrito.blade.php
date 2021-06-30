@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Carrito de Compras</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
		              <li class="breadcrumb-item active" aria-current="page">Carro de Compras</li>
		            </ol>
	          </nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= --> 
 <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                @if(count(Cart::getContent()))                 
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Producto</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col">Remover</th>                          
                              <th scope="col">Total</th>
                          </tr>
                      </thead>                    
                      <tbody>
                      @foreach(Cart::getContent()->sortBy('name') as $pro)                      
                          <tr>
                              <td>
                                  <div class="media">
                                    <div class="d-flex">
                                          <img src="/productoimg/{{$pro->attributes->imagen}}" alt="" style="width: 135px; height: 130px;" class="img-fluid">
                                      </div>
                                      <div class="media-body">
                                          <p>{{$pro->name}}</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5>${{number_format($pro->price, 2)}}</h5>
                              </td>
                              <td>
                                <form method="POST" action="{{route('cart.actualizar')}}">
                                  @csrf      
                                  <input type="hidden" value="{{$pro->id}}" id="id" name="id">                          
                                  <div class="product_count">
                                    <input type="number" id="quantity" name="quantity" value="{{$pro->quantity}}" >
                                  </div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i></button>
                                </form>
                              </td>
                              <td>                                
                                <form method="POST" action="{{route('cart.removeitem')}}">                                    
                                    @csrf
                                    <input type="hidden" name="code" value="{{$pro->id}}">
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                              </td>
                              <td>
                                  <h5>${{number_format($pro->quantity*$pro->price, 2)}}</h5>
                              </td>
                          </tr>
                          @endforeach
                          <!--<tr class="bottom_button">
                              <td>
                                  
                              </td>
                              <td height="10px;">

                              </td>
                              <td>
                                
                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="cupon_text d-flex align-items-center">
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>¿Tiene un cupón?</strong>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                        
                                      <input type="text" placeholder="Código de cupón">
                                      <a class="primary-btn" href="#">Aplicar</a>
                                  </div>
                              </td>
                          </tr>-->
                          <tr>
                              <td>
                                <a class="button" href="{{route('cart.clear')}}">Vaciar Carrito</a>
                              </td>
                              <td>
                                <h5> Comisión PayPal</h5>
                                <?php $comision = (Cart::getSubTotal()/100)*4.9; ?>
                              </td>
                              <td>
                               <h5>${{number_format( $comision+4,2) }}
                              </td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <td>
                                  <h5>${{number_format(Cart::getSubTotal(), 2)}}</h5>
                              </td>
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                              <td>
                                <h5 align="right">Envío</h5>
                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="shipping_box">
                                      <ul class="list">
                                          <li><a href="#">Total:${{number_format(Cart::getSubTotal()+$comision+4, 2)}} </a></li>
                                      </ul>
                                      <h6>Elije Dirección <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                      <select class="shipping_select">
                                        @foreach($domicilio as $d)
                                          <option value="{{$d->id}}" style="text-transform:capitalize">{{$d->calle}} #{{$d->noext}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </td>
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                
                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="gray_btn" href="/catalogo">Seguir Comprando</a>
                                      <a class="primary-btn ml-2" href="/revisar">Continuar</a>
                                  </div>
                              </td>
                          </tr>                      
                      </tbody>                    
                  </table>
                  @else
                  <center>
                    <h1>¡Carrito Vacio!</h1><br>
                  <img src="/recursos/carritovacio.png" class="img-fluid"><br><br>
                  <a href="/catalogo"><button type="submit" class="btn btn-primary">Agregar Productos</button></a>
                  </center>                                                         
                @endif
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
@endsection