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
						<form class="row login_form" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" autocomplete="email" autofocus>

								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember">
									<label for="f-option2">Recuérdame</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Iniciar Sesión</button>
								<a href="#">¿Has olvidado tu contraseña?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
@endsection