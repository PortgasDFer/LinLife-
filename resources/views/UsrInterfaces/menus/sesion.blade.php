<div class="main_menu">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand logo_h" href="/"><img src="/recursos/linlife2.png"></a>
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
          <li class="nav-item"><a class="nav-link" href="/negocio">Negocio</a></li>      
          <li class="nav-item"><a class="nav-link" href="/nosotros">Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="/contacto">Contacto</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('cart.checkout')}}">Carrito</a></li>		              
        </ul>
        <ul class="nav-shop">
        	<li class="nav-item"><button><i class="ti-search"></i></button></li>
        	@if(count(Cart::getContent()))
  			<li class="nav-item"><a href="{{route('cart.checkout')}}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{count(Cart::getContent())}}</span></button> </a></li>
  			@else
  			<li class="nav-item"><a href="{{route('cart.checkout')}}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">0</span></button> </a></li>
  			@endif        
          <li class="nav-item submenu dropdown">
            <a href="#" class="button button-header"   data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">
                  @if(Auth::user()->avatar!=null)
                    <img src="/imgusers/{{Auth::user()->avatar}}" style="width: 30px; border-radius: 20px;" class="img-fluid"> 
                    &nbsp;
                  @else
                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" style="width: 30px; border-radius: 20px;" class="img-fluid">
                    &nbsp;
                  @endif
                {{ Auth::user()->name }} {{Auth::user()->aPaterno}}</a>
              <ul class="dropdown-menu">
                <a class="dropdown-item" href="/home" style="width: 206px;"><i class="fa fa-user" aria-hidden="true"></i> Mi Cuenta</a>                
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class='fas fa-sign-out-alt'></i> Cerrar sesión
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>        
                  </a>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</div>