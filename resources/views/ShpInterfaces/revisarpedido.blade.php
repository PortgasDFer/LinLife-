@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Pedido</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
		              <li class="breadcrumb-item active" aria-current="page">Pedido</li>
		            </ol>
	          </nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= --> 
<!--================Order Details Area =================-->
  <section class="order_details section-margin--small">
    <div class="container">
      <div class="row">
      <div class="col-12">
         <div class="order_box">
          @if(count(Cart::getContent()))  
            <h2>Your Order Folio: {{$nuevofolio}}</h2>
            <ul class="list">
                <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                @foreach(Cart::getContent()->sortBy('name') as $pro) 
                <li><a href="#">{{$pro->name}} <span class="middle">x {{$pro->quantity}}</span> <span class="last">${{number_format($pro->price, 2)}}</span></a></li>
                @endforeach
            </ul>
            <ul class="list list_2">
                <li><a href="#">Subtotal <span>${{number_format(Cart::getSubTotal(), 2)}}</span></a></li>
                <li><a href="#">Envío <span>Flat rate: $50.00</span></a></li>
                <li><a href="#">Total <span>${{number_format(Cart::getTotal(), 2)}}</span></a></li>
            </ul>
            <div class="payment_item active">
                <div class="radion_btn">
                    <input type="radio" id="f-option6" name="selector">
                    <label for="f-option6">Paypal </label>
                    <img src="/recursos/card.jpg" alt="">
                    <div class="check"></div>
                </div>
                <p>Pague a través de PayPal.</p>
            </div>
            <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" required="">
                <label for="f-option4">He leído y acepto los términos y condiciones*.</a>
            </div>
            <div class="text-center">
              <form action="/insertarCarrito/{{$nuevofolio}}" method="POST">
                @csrf
                <input type="hidden" name="monto" value="{{number_format(Cart::getTotal(), 2)}}">
                <input type="hidden" name="folio" value="{{$nuevofolio}}">
                <button type="submit" class="button button-paypal"> Proceda a Paypal </button>
              </form>
            </div>
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
    </div>
  </section>
  <!--================End Order Details Area =================-->
@endsection