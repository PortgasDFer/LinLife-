@extends('layouts.sitio')
@section('title','- Productos')
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
	        <div class="head">Filtro por Precio</div>	        
	        <ul class="main-categories">
	          <li class="common-filter">
	            <form action="/catalogo" method="GET">
	            	@csrf
	              Seleccione precio minimo:
	              <center>
				      <input type="range" name="minimo" value="0" min="100" max="500" oninput="this.nextElementSibling.value = this.value">
							$<output>0</output>
						</center>
						Seleccione precio maximo:
						<center>
							<input type="range" name="maximo" value="0" min="200" max="1000" oninput="this.nextElementSibling.value = this.value">
							$<output>0</output>
							</center> 
							&nbsp;									
							<center> 
			      	<button type="submit" class="button button-header btn-sm">Aplicar</button>
			      </center>              	
	            </form>	           
	          </li>
	        </ul>
	      </div>
	    </div>
	    <div class="col-xl-9 col-lg-8 col-md-7">
	      <!-- Start Filter Bar -->
	      <div class="filter-bar d-flex flex-wrap align-items-center">
	        <div class="sorting mr-auto">
	          
	        </div>
	        <div>
	        	<form>
          		<div class="input-group filter-bar-search">	          	
		            <input type="text" placeholder="Buscar" name="buscar" value="{{$buscar}}">
		            <div class="input-group-append">
		              <button type="input"><i class="ti-search"></i></button>
		            </div>		            
          		</div>
	          </form>
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
	                <p class="card-product__price">${{number_format($p->precio_publico, 2)}}</p>
	              </div>
	            </div>
	          </div>
	          @endforeach	

	        </div>
	      </section>	      
	      <!-- End Best Seller -->
	      <div class="float-right">{{$productos->links()}}</div>	      
	    </div>

	  </div>	  
	</div>
</section>
<!-- ================ category section end ================= -->		  
@endsection
@section('scripts')
<script type="text/javascript">

</script>
@endsection