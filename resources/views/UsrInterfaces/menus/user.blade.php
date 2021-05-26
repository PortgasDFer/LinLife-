<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
  <li class="nav-item">
    <a href="/home" class="nav-link">
      <i class="fas fa-home nav-icon"></i>
      <p>Página principal</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/micuenta/{{Auth::user()->slug}}" class="nav-link">
      <i class="fas fa-info-circle nav-icon"></i>
      <p>Detalles de mi cuenta</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-users"></i>
      <p>
        Mi red
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/estructura-de-red/{{Auth::user()->slug}}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Estructura de red</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/lista-de-red/{{Auth::user()->slug}}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Lista</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/usuarios/create" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Registrar socio</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-dollar-sign"></i>
      <p>
        Mis ingresos
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/semana/{{Auth::user()->slug}}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Esta semana</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="vistas/ingresos/mes.html" class="nav-link">    
        <a href="/mes/{{Auth::user()->slug}}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Este mes</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/desglose/{{Auth::user()->slug}}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Desglose</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-shopping-cart"></i>
      <p>
        Mis compras
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{action('VentasController@create') }}" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Realizar pedido</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/promociones-del-mes" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Promociones del mes</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/cobros-sobre-comisiones" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Cobro sobre comisiones</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/historial" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Historial</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-wrench"></i> 
      <p>
        Herramientas
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="mensajes.html" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Mensajes</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Documentos</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-cog"></i>
      <p>
        Configuración
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="/cuenta" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Mi cuenta</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/domicilios" class="nav-link">
          <i class="far fa-dot-circle nav-icon"></i>
          <p>Domicilios</p>
        </a>
      </li>
    </ul>
  </li>
</ul>