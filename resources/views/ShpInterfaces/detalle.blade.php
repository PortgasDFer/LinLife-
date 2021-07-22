@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="blog">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Detalle</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
		            <ol class="breadcrumb">
		              <li class="breadcrumb-item"><a href="/catalogo">Productos</a></li>
		              <li class="breadcrumb-item active" aria-current="page">{{$detalle->nombre}}</li>
		            </ol>
	          </nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->
<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="single-prd-item">
						<img class="img-fluid" src="/productoimg/{{$detalle->imagen}}" style="width: 600px; height: 555px;">
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$detalle->nombre}}</h3>
						<h2>${{number_format($detalle->precio_publico, 2)}}</h2>
						<ul class="list">							
							<li><a href="#"><span>En Stock</span> : {{$detalle->cantidad}}</a></li>
						</ul>
						<p>{{$detalle->descripcion}}</p>
						<br>
						@guest
						<div class="product_count">
							<label for="qty">Cantidad:</label>
							<input type="number" name="quantity" size="2" maxlength="12" value="0" class="input-text qty">                   	                      	
	                    </div>
	                    <button type="submit" class="button button--active button-review" onClick="Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            confirmButtonText: `Aceptar`,
                            text: 'Necesitas Iniciar Sesión',
                            footer: '<a href=/iniciar>Inicia Sesión o Registrate</a>'
                          })">Agregar al Carrito</button>
                		@else
						<form method="POST" action="{{route('cart.agregar')}}">
							@csrf
							<div class="product_count">								
								<input type="hidden" name="code_producto" value="{{$detalle->code}}">
	              				<label for="qty">Cantidad:</label>
								<input type="number" name="quantity" size="2" maxlength="12" value="0" class="input-text qty">				
							</div>
							<div class="review_box">
								<button type="submit" class="button button--active button-review">Agregar al Carrito</button>
							</div>
						</form>
						@endguest                			
						<div class="card_area d-flex align-items-center">							
							<a class="icon_btn" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	&nbsp;
	<!--================End Single Product Area =================-->	
@endsection