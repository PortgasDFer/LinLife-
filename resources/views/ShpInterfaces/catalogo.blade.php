@extends('layouts.sitio')
@section('content')
<!-- ================ start banner area ================= -->	
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Productos</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
			        <ol class="breadcrumb">
			          <li class="breadcrumb-item"><a href="/">Inicio</a></li>
			          <li class="breadcrumb-item active" aria-current="page">Productos</li>
			        </ol>
			    </nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->
<!-- ================ category section start ================= -->		  
<section class="section-margin--small mb-5">
	<div class="container">
	  <div class="row">
	    <div class="col-xl-3 col-lg-4 col-md-5">
	      <div class="sidebar-categories">
	        <div class="head">Categorias</div>
	        <ul class="main-categories">
	          <li class="common-filter">
	            <form action="#">
	              <ul>
	                <li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand"><label for="men">Alguna categoria<span> (10)</span></label></li>
	                <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Otra categoria<span> (21)</span></label></li>
	                <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Otra categoria<span> (21)</span></label></li>
	                <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Otra categoria<span> (21)</span></label></li>
	                <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Otra categoria<span> (21)</span></label></li>
	              </ul>
	            </form>
	          </li>
	        </ul>
	      </div>
	      <div class="sidebar-filter">
	        <div class="top-filter-head">Filtros</div>
	        <div class="common-filter">
	          <div class="head">Filtro 1</div>
	          <form action="#">
	            <ul>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Filtro 1<span>(29)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Filtro 2<span>(5)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Filtro 3<span>(5)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Filtro 4<span>(16)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Filtro 5<span>(5)</span></label></li>
	            </ul>
	          </form>
	        </div>
	        <div class="common-filter">
	          <div class="head">Filtro 2</div>
	          <form action="#">
	            <ul>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Filtro<span>(9)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Algún filtro<span>(29)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Filtro<span>(2)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Filtro<span>(2)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Filtro<span>(2)</span></label></li>
	              <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Filtro<span>(2)</span></label></li>
	            </ul>
	          </form>
	        </div>
	      </div>
	    </div>
	    <div class="col-xl-9 col-lg-8 col-md-7">
	      <!-- Start Filter Bar -->
	      <div class="filter-bar d-flex flex-wrap align-items-center">
	        <div class="sorting">
	          <select>
	            <option value="1">Ordenar por...</option>
	            <option value="1">Ordenar por...</option>
	            <option value="1">Ordenar por...</option>
	          </select>
	        </div>
	        <div class="sorting mr-auto">
	          <select>
	            <option value="1">Mostrar 10</option>
	            <option value="1">Mostrar 15</option>
	            <option value="1">Mostrar 30</option>
	          </select>
	        </div>
	        <div>
	          <div class="input-group filter-bar-search">
	            <input type="text" placeholder="Buscar">
	            <div class="input-group-append">
	              <button type="button"><i class="ti-search"></i></button>
	            </div>
	          </div>
	        </div>
	      </div>
	      <!-- End Filter Bar -->
	      <!-- Start Best Seller -->
	      <section class="lattest-product-area pb-40 category-list">
	        <div class="row">
	          @foreach($productos as $p)
	          <div class="col-md-6 col-lg-4">
	            <div class="card text-center card-product">
	              <div class="card-product__img" >
	                <img class="card-img" src="/productoimg/{{$p->imagen}}" style="width: 255px; height: 263px;">
	                <ul class="card-product__imgOverlay">
		                @guest                   
                    		<li><button type="submit" onClick="Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        confirmButtonText: `Aceptar`,
                                                        text: 'Necesitas Iniciar Sesión',
                                                        footer: '<a href=/iniciar>Inicia Sesión o Registrate</a>'
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
	                <p>Suplementos</p>
	                <h4 class="card-product__title"><a href="/detalle/{{$p->slug}}">{{$p->nombre}}</a></h4>
	                <p class="card-product__price">${{number_format($p->precio_publico, 2, '.', ',')}}</p>
	              </div>
	            </div>
	          </div>
	          @endforeach
	        </div>
	      </section>
	      <!-- End Best Seller -->
	    </div>
	  </div>
	</div>
</section>
<!-- ================ category section end ================= -->		  
@endsection