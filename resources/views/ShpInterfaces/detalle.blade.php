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
						<h2>${{$detalle->precio_publico}}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Categoría</span> : {{$detalle->categoria}}</a></li>
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
	<!--================End Single Product Area =================-->	
	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Comentarios</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{$detalle->descripcion}}</p>
				</div>
				<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-1.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>										
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Publicar un comentario</h4>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Nombre Completo">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="number" name="number" placeholder="Número de Teléfono">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Mensaje"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" class="button button--active button-review">Publicar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->  
@endsection