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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<style type="text/css">
			/* padding-bottom and top for image */
			.mfp-no-margins img.mfp-img {
				padding: 0;
			}
			/* position of shadow behind the image */
			.mfp-no-margins .mfp-figure:after {
				top: 0;
				bottom: 0;
			}
			/* padding for main container */
			.mfp-no-margins .mfp-container {
				padding: 0;
			}
		</style>
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
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Otros Enlaces</h4>
							<ul class="list">
								<li><a href="/">Inicio</a></li>
								<li><a href="/catalogo">Productos</a></li>												
								<li><a href="/negocio">Negocio</a></li>
								<li><a href="/nosotros">Nosotros</a></li>
								<li><a href="/contacto">Contacto</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Galería</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><a class="image-popup-vertical-fit" href="recursos/ARANDANO.png"><img src="recursos/1.png"></a></li>
								<li><a class="image-popup-vertical-fit" href="recursos/CITRICOS.jpg"><img src="recursos/2.jpg"></a></li>
								<li><a class="image-popup-vertical-fit" href="recursos/GELATINA.png"><img src="recursos/3.png"></a></li>
								<li><a class="image-popup-vertical-fit" href="recursos/TAMARINDO.png"><img src="recursos/4.png"></a></li>
								<li><a class="image-popup-vertical-fit" href="recursos/VASO-DIARIO.png"><img src="recursos/5.png"></a></li>
								<li><a class="image-popup-vertical-fit" href="recursos/vitamina-c.jpg"><img src="recursos/6.jpg"></a></li>
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
									5510647080 <br>									
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									ventas2@linlife.com.mx
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
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta plantilla está hecha por <i class="fa fa-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			$('.image-popup-vertical-fit').magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				mainClass: 'mfp-img-mobile',
				image: {
					verticalFit: true
				}
				
			});
		});
	</script>
	</body>
</html>