@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= --> 
<section class="blog-banner-area" id="category">
  <div class="container h-100">
    <div class="blog-banner">
      <div class="text-center">
        <h1>Contacto</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
              </ol>
          </nav>
      </div>
    </div>
  </div>
</section>
<!-- ================ end banner area ================= -->
<!-- ================ contact section start ================= -->
  <section class="section-margin--small">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">        
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30101.70317901607!2d-99.023744!3d19.424807!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x729a23faaf13bd51!2sPlaza%20Ciudad%20Jard%C3%ADn!5e0!3m2!1ses-419!2smx!4v1620364214528!5m2!1ses-419!2smx" width="1110" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>        
      </div>
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>California United States</h3>
              <p>Santa monica bullevard</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">5510647080</a></h3>
              <p>De lunes a viernes de 9 a.m. A 6 p.m.</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="ventas2@linlife.com.mx">ventas2@linlife.com.mx</a></h3>
              <p>¡Envíanos tu consulta en cualquier momento!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="/mensaje" method="post" enctype="multipart/form-data">
            @csrf  
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" type="text" placeholder="Nombre Completo" value="{{ old('nombre') }}">
                  @error('nombre')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="Correo Electronico" value="{{ old('email') }}">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input class="form-control @error('tema') is-invalid @enderror" name="tema" id="tema" type="text" placeholder="Tema" value="{{ old('tema') }}">
                  @error('tema')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100 @error('mensaje') is-invalid @enderror" name="mensaje" id="mensaje" cols="30" rows="5" placeholder="Mensaje">{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Enviar Mensaje</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->
    
@endsection