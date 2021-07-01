<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Lin Life - Inicio</title>
		<link rel="icon" href="{{asset('recursos/favicon.ico')}}" type="image/png">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/bootstrap/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/themify-icons/themify-icons.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/linericon/style.csss')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/nice-select/nice-select.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/owl-carousel/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/owl-carousel/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/nouislider/nouislider.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendorsvendors/nice-select/nice-select.css')}}">
		
		<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<!--================ Start Header Menu Area =================-->
		<header class="header_area">
		    <!--Menú de invitado-->
	     	@guest
                @include('UsrInterfaces.menus.invitado')
            @else
                @include('UsrInterfaces.menus.sesion')
            @endguest
      		
		</header>
		<!--================ End Header Menu Area =================-->
		@yield('content')
		<!--================ Start footer Area  =================-->	
		<footer>
		<div class="footer-area footer-only">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets ">
							<h4 class="footer_title large_title">LinLife</h4>
							<p>
								Somos una empresa 100% mexicana fundada por alumnos del ITV y la UV tomando la iniciativa de mejorar la salud del pueblo mexicano, buscando los mejores laboratorios para maquilar su producto. 
							</p>
							<p>
								Considerando CDMX y EDOMEX para dar a conocer el producto, en consecuencia estudiantes de Medicina de la UNAM se han sumado a la causa.
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Otros Enlaces</h4>
							<ul class="list">
								<li><a href="#">Inicio</a></li>
								<li><a href="#">Productos</a></li>
								<li><a href="#">Carrito</a></li>
								<li><a href="#">Registrarse</a></li>
								<li><a href="#">Iniciar sesión</a></li>
								<li><a href="#">Contacto</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Galería</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="recursos/1.png" alt=""></li>
								<li><img src="recursos/2.jpg" alt=""></li>
								<li><img src="recursos/3.png" alt=""></li>
								<li><img src="recursos/4.png" alt=""></li>
								<li><img src="recursos/5.png" alt=""></li>
								<li><img src="recursos/6.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contacto</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									LinLife
								</p>
								<p>123,Polanco,CDMX</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Telefonos
								</p>
								<p>
									+123 456 78910 <br>
									+123 456 78910
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									LinLife@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
		<!--================ End footer Area  =================-->
	@include('sweetalert::alert')	
	<script src="{{asset('assets/shop/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<!--<script src="{{asset('assets/shop/vendors/skrollr.min.js')}}"></script>Scroll no funciona en moviles-->
	<script src="{{asset('assets/shop/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/nouislider/nouislider.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/mail-script.js')}}"></script>
	<script src="{{asset('assets/shop/js/main.js')}}"></script>
	</body>
</html>