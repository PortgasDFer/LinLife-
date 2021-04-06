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
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/nice-select/nice-select.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/owl-carousel/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/vendors/owl-carousel/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/shop/css/style.css')}}">
	</head>
	<body>
		<!--================ Start Header Menu Area =================-->
		<header class="header_area">
		    <div class="main_menu">
		      <nav class="navbar navbar-expand-lg navbar-light">
		        <div class="container">
		          <a class="navbar-brand logo_h" href="index.html"><img src="recursos/LOGO LINLIFE OFICIAL.png" alt="" width="200"></a>
		          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
		            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
		              <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
		              <li class="nav-item"><a class="nav-link" href="/catalogo">Productos</a></li>
		              <li class="nav-item"><a class="nav-link" href="/registro">Registrarse</a></li>
		              <li class="nav-item"><a class="nav-link" href="/iniciar">Iniciar sesión</a></li>
		              <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
		            </ul>

		            <ul class="nav-shop">
		              <li class="nav-item"><a class="button button-header" href="#">Carrito</a></li>
		            </ul>
		          </div>
		        </div>
		      </nav>
		    </div>
		</header>
		<!--================ End Header Menu Area =================-->
		@yield('content')
		<!--================ Start footer Area  =================-->	
		<footer>
			<div class="footer-area">
				<div class="container">
					<div class="row section_gap">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget tp_widgets">
								<h4 class="footer_title large_title">LinLife</h4>
								<p>
									Datos de la empresa.
								</p>
								<p>
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quae itaque qui, quis aliquid error expedita fuga, labore odio molestias porro consequuntur similique distinctio soluta, animi nihil numquam aliquam quod.
								</p>
							</div>
						</div>
						<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget tp_widgets">
								<h4 class="footer_title">Quick Links</h4>
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
								<h4 class="footer_title">Otros enlaces</h4>
								<ul class="list instafeed d-flex flex-wrap">
									<li><img src="img/gallery/r1.jpg" alt=""></li>
									<li><img src="img/gallery/r2.jpg" alt=""></li>
									<li><img src="img/gallery/r3.jpg" alt=""></li>
									<li><img src="img/gallery/r5.jpg" alt=""></li>
									<li><img src="img/gallery/r7.jpg" alt=""></li>
									<li><img src="img/gallery/r8.jpg" alt=""></li>
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
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Con la ayuda de: <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</footer>
		<!--================ End footer Area  =================-->
	<script src="{{asset('assets/shop/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/skrollr.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('assets/shop/vendors/mail-script.js')}}"></script>
	<script src="{{asset('assets/shop/js/main.js')}}"></script>
	</body>
</html>