@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Login / Registro</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
			        <ol class="breadcrumb">
			          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
			          <li class="breadcrumb-item active" aria-current="page">Login/Registrarse</li>
			        </ol>
      			</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->
<!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>¿Eres nuevo?</h4>
							<p>Convierte en socio y obten muchos beneficios</p>
							<a class="button button-account" href="/registro">Registrate</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="#/" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@endsection