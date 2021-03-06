@extends('layouts.sitio')
@section('title','- Inicio')
@section('content')
<main class="site-main">
    
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">              
              <img class="img-fluid" src="assets/shop/img/home/crema2.png" style=" height: 400px;">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <img src="recursos/logotrans.png" class="img-fluid">
              
              <p>Teniendo un producto de grandes beneficios y alto impacto, LinLife opta por distribuir su producto en un sistema por niveles mĂșltiples.
              <br>
              Brindando un negocio y bienestar a las personas que deseen ayudar a otros.</p>
              <a class="button button-hero" href="/catalogo">Explorar ahora</a>
              &nbsp;
              <br>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="assets/shop/img/home/crema2.png" style="height: 430px; width: 633px;" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="assets/shop/img/home/crema1.png" style="height: 430px; width: 633px;" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
         <img src="assets/shop/img/home/frasco1.png" style="height: 430px; width: 633px;" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">        
          <h2>Ăltimos <span class="section-intro__style">Productos</span></h2>
        </div>
        <div class="row">
          @foreach($productos as $p)
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="/productoimg/{{$p->imagen}}" style="height: 280px; width: 255px;">
                <ul class="card-product__imgOverlay">
                @guest                   
                    <li><button type="submit" onClick="Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        confirmButtonText: `Aceptar`,
                                                        text: 'Necesitas Iniciar SesiĂłn',
                                                        footer: '<a href=/iniciar>Inicia SesiĂłn o Registrate</a>'
                                                      })">
                      <i class="ti-shopping-cart"></i></button></li>
                @else
                  <form method="POST" action="{{route('cart.add')}}">
                  @csrf                     
                  <input type="hidden" name="code_producto" value="{{$p->code}}">
                    <li><button type="submit" ><i class="ti-shopping-cart"></i></button></li>
                  </form>
                @endguest                                                       
                </ul>
              </div>
              <div class="card-body">
                <p>Accessories</p>
                <h4 class="card-product__title"><a href="/detalle/{{$p->slug}}">{{$p->nombre}}</a></h4>
                <p class="card-product__price">${{number_format($p->precio_publico, 2)}}</}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Registrarte y empieza a GANAR YA MISMO</h3>
              <h4>!Gana un ProductoÂĄ</h4>
              <p>Solo por referir, muy simple.</p>
              <a class="button button--active mt-3 mt-xl-4" href="/registro">Registrar</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= --> 

    <!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">          
          <h2>Nuestra AfiliaciĂłn<span class="section-intro__style"> y sus beneficios</span></h2>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('recursos/carousel1.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('recursos/carousel2.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('recursos/carousel3.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('recursos/carousel4.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('recursos/carousel5.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
                <div class="carousel-item">
                  <img src="{{asset('recursos/carousel6.jpg')}}" class="d-block w-100" alt="Afiliate a LinLife">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color:black;"></span>
                <span class="sr-only">Anteior</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="color:black;"></span>
                <span class="sr-only">Siguiente</span>
              </a>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6">
            <img src="{{asset('recursos/celulas.jpg')}}" alt="" class="img-fluid">
          </div>
        </div>
        
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">          
          <h2>Nuevos <span class="section-intro__style">Socios</span></h2>
        </div>
        <div class="row">
          @forelse($users as $u)
          <div class="col-md-7 col-lg-12 col-xl-2">
            <center>
              @if($u->avatar!=null)
                <img src="/imgusers/{{$u->avatar}}" class="rounded-circle img-fluid" style="width: 100px;">
              @else
                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"class="rounded-circle img-fluid" style="width: 100px;">
                @endif
              <br>
              &nbsp;
              <h5>{{$u->code}}</h5>
              <p class="text-uppercase">{{$u->name}} {{$u->aPaterno}}</p>
            </center>
          </div>
          @empty
          <p>No hay Usuarios nuevos.</p>
          @endforelse
        </div>    
      </div>
    </section>
    <!-- ================ Blog section start ================= -->  

  </main>
@endsection