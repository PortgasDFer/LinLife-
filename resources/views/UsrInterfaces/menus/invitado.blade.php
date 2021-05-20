<div class="main_menu">
				  <nav class="navbar navbar-expand-lg navbar-light">
				    <div class="container">
				      <a class="navbar-brand logo_h" href="/"><img src="/recursos/linlife.png"></a>
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
				          <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>		              
				        </ul>
				        <ul class="nav-shop">
				        	<li class="nav-item"><button><i class="ti-search"></i></button></li>
				        	@if(count(Cart::getContent()))
				  			<li class="nav-item"><a href="{{route('cart.checkout')}}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{count(Cart::getContent())}}</span></button> </a></li>
				  			@else
				  			<li class="nav-item"><a href="{{route('cart.checkout')}}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">0</span></button> </a></li>
				  			@endif
				          <li class="nav-item"><a class="button button-header" href="/iniciar">Iniciar sesión</a></li>
				        </ul>
				      </div>
				    </div>
				  </nav>
				</div>