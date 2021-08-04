  @extends('layouts.admin')
@section('title','Cuenta')
@section('content')
<style type="text/css" media="screen">
    a {color: white;  text-decoration: none;}
    a:hover {color: white;text-decoration: none;}
    a:visited {color: white;text-decoration: none;}    
}
  </style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Cuenta </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home" style="color: blue;">Home</a></li>
          <li class="breadcrumb-item active">Cuenta</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 h4" style="margin:0;">
            <h4>Detalle de socio <span class="badge badge-dark">{{ $usuario->code }}</span></h4>
          </div>
          <div class="col-sm">
            <div class="btn-group btn-group-justified" role="group" aria-label="Basic mixed styles example">
              <a href="/home"><button type="button" class="btn btn-secondary "><i class="fa fa-home" aria-hidden="true"></i> Inicio</button></a>
              <button type="button" class="btn btn-info"><i class='fas fa-money-bill-alt'></i> Pagos</button>
              <button type="button" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Downline</button>
              <button type="button" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> Upline</button>
              <button type="button" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pedidos</button>
            </div>
          </div>
         </div>
         &nbsp;
         <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black; ">
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Verifica que tus datos personales, bancarios y de contacto sean correctos.
        </div>
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne" style="background-color: #6c757d; color: #ffffff;">
              <h5 class="mb-0" style="color: #ffffff;">
                <a data-toggle="collapse" data-target="#datos" aria-expanded="true" aria-controls="collapseOne" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-user" aria-hidden="true"></i> Datos generales 
                </a>
              </h5>
            </div>            
            <div id="datos" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <form method="POST" action="/datos/{{auth()->id()}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <div class="form-group col-md-2">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Nombre(s)</label>
                      <input type="input" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" readonly="" value="{{ $usuario->name }}">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Apellido Paterno</label>
                      <input type="input" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno" readonly="" value="{{ $usuario->aPaterno }}">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Apellido Materno</label>
                      <input type="input" class="form-control" id="apmaterno" name="apmaterno"readonly="" placeholder="Apellido Materno" value="{{ $usuario->aMaterno }}"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Correo Electrónico</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Correo Electrónico" autocomplete="email"  value="{{ $usuario->email }}">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Estado Civil</label>
                    <div class="col-sm-4">
                       <select id="estado" name="estado" class="form-control @error('estado') is-invalid @enderror">                                          
                        <option selected>{{$usuario->estado_civil}}</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Unión Libre">Unión Libre</option>
                        
                      </select>
                      @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Fecha de Nacimiento</label>
                    <div class="col-sm-4">
                      <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" id="fecha" placeholder="Fecha de Nacimiento" value="{{$usuario->fechanac}}">
                      @error('fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror                      
                    </div>
                    <label for="colFormLabel" class="col-sm-3 col-form-label @error('entidadnac') is-invalid @enderror" style="text-align: right;">Entidad de Nacimiento</label>
                    <div class="col-sm-3">
                      <select id="entidadnac" name="entidadnac" class="form-control">
                        <option>{{$usuario->entidadnac}}</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="CDMX">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>                        
                      </select>
                      @error('entidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                        &nbsp;
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Actualizar Datos</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo" style="background-color: #6c757d; color: #ffffff;">
              <h5 class="mb-0">
                <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-map-marker" aria-hidden="true"></i> Domicilios
                </a>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group col-sm-4-offset">
                    <a href="/domicilios"><button type="button" class="btn btn-warning btn-block"><i class="fa fa-map-marker" aria-hidden="true"></i> Editar Domicilios</button></a>
                  </div>
                   <div class="row no-gutters">
                  @foreach($domicilio as $d)
                <div class="card bg-light mb-12">
                  <div class="card-header">{{$d->nombre}}</div>
                  <div class="card-body">                    
                    <p>Calle: {{$d->calle}} #{{ $d->noext}} {{ $d->noint}} <br>Colonia: {{$d->colonia}}<br>C.P.: {{ $d->cp}}<br><strong>{{ $d->entidad}} </strong><br></p>                    
                  </div>
                </div>
                &nbsp;&nbsp;&nbsp;
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-header" id="pass" style="background-color: #6c757d; color: #ffffff;">
              <h5 class="mb-0" style="color: #ffffff;">
                <a data-toggle="collapse" data-target="#passwords" aria-expanded="true" aria-controls="collapseOne" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-key" aria-hidden="true"></i> Contraseña 
                </a>
              </h5>
            </div>
            <div id="passwords" class="collapse" aria-labelledby="pass" data-parent="#accordionExample">
              <div class="card-body">
                <form method="POST" action="/contra/{{auth()->id()}}" enctype="multipart/form-data">                
                @csrf
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Contraseña Actual</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="passact" name="passact" placeholder="Contraseña Actual" readonly=""value="{{ $usuario->password }}" >
                  </div>
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Contraseña Nueva</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña Nueva">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                  </div>                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Cambiar Contraseña</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="tel" style="background-color: #6c757d; color: #ffffff;">
              <h5 class="mb-0" style="color: #ffffff;">
                <a data-toggle="collapse" data-target="#telefonos" aria-expanded="true" aria-controls="collapseOne" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-phone" aria-hidden="true"></i> Teléfonos
                </a>
              </h5>
            </div>
            <div id="telefonos" class="collapse" aria-labelledby="tel" data-parent="#accordionExample">
              <div class="card-body">
              <div class="alert alert-danger" role="alert" style="background-color:  #E4E4E4; color: black; font-size: 12px;">
                <i class='fas fa-exclamation-circle'></i> Al igual que tu correo electrónico, tus números telefonicos son muy importantes ya que son nuestro medio de contacto directo contigo. ¡Mantenlos actualizados!.
              </div>
              <form method="POST" action="/tel/{{auth()->id()}}" enctype="multipart/form-data">                
                @csrf
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Fijo</label>
                  <div class="col-sm-4">
                    <input type="input" class="form-control @error('fijo') is-invalid @enderror" id="fijo" name="fijo" placeholder="Fijo" value="{{ $usuario->telcasa }}">
                    @error('fijo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Actualizar</button>
                  </div>
                </div>
                </form>
                <form method="POST" action="/cel/{{auth()->id()}}" enctype="multipart/form-data">                
                @csrf
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Celular</label>
                  <div class="col-sm-4">
                    <input type="input" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Celular" value="{{ $usuario->telcel }}">
                    @error('celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Actualizar</button>
                  </div>
                </div>
                </form>                           
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="fac" style="background-color: #E94C4C; color: #ffffff;">
              <h5 class="mb-0" style="color: #ffffff;">
                <a data-toggle="collapse" data-target="#facturacion" aria-expanded="true" aria-controls="collapseOne" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-file" aria-hidden="true"></i> Facturación
                </a>
              </h5>
            </div>
            <div id="facturacion" class="collapse" aria-labelledby="fac" data-parent="#accordionExample">
              <div class="card-body">   
                <form method="POST" action="/fac/{{auth()->id()}}" enctype="multipart/form-data">                
                @csrf
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">CURP</label>
                    <div class="col-sm-4">
                      <input type="text" style="text-transform:uppercase;" class="form-control @error('curp') is-invalid @enderror" id="curp" name="curp" placeholder="CURP" value="{{$usuario->curp}}">
                      @error('curp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>                                      
                  </div>
                  <hr>
                  <div class="form-group row">
                   <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Banco</label>
                    <div class="col-sm-4">
                      <select id="banco" name="banco" class="form-control @error('banco') is-invalid @enderror">
                        <option selected>{{$usuario->banco}}</option>
                        <option value="Azteca">Azteca</option>                        
                      </select>                      
                      @error('banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right; color: red;"><i class="fa fa-exclamation-triangle" style="color: red;" aria-hidden="true"></i> CLABE Interbancaria</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control  @error('clabe') is-invalid @enderror" id="clabe" name="clabe" placeholder="CLABE Interbancaria" value="{{$usuario->clabe}}">
                      @error('clabe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Beneficiario</label>
                    <div class="col-sm-4">
                      <input type="text" style="text-transform:uppercase;" class="form-control  @error('beneficiario') is-invalid @enderror" id="beneficiario" name="beneficiario" placeholder="Beneficiario" value="{{$usuario->beneficiario}}">
                      @error('beneficiario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">RFC</label>
                    <div class="col-sm-4">
                      <input type="text" style="text-transform:uppercase;" class="form-control  @error('rfc') is-invalid @enderror" id="rfc" name="rfc" placeholder="RFC" value="{{$usuario->rfc}}">
                      @error('rfc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                    <div class="col-sm-4">
                      <p style="font-size: 15px;"><i class="fa fa-exclamation-triangle" style="color: red;" aria-hidden="true"></i> No verificada</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Constancia en PDF</label>
                    <div class="col-sm-4">
                        <input type="file" name="constancia" class="form-control  @error('constancia') is-invalid @enderror">
                        @error('constancia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                    <div class="col-sm-6">
                      <p style="font-size: 12px;"> Para verificar tu RFC, necesitas: <br> 1.Asegurarte que tu correo electrónico esté activo, pues será el medio de contacto para la facturación. <br> 2.Cargar tu Constancia de Situación Fiscal actualizada la cual puedes obtener en el Portal del SAT.</p>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;"></label>
                    <div class="col-sm-4">
                        <input type="checkbox" checked data-toggle="toggle" data-on="X" data-off="✔" data-onstyle="success" data-offstyle="warning" name="sexo">
                        NO-RETENCION ISR DESACTIVADA
                    </div>
                    <div class="col-sm-6">
                      <p style="font-size: 12px;"> Por Ley, LINLIFE retiene el ISR antes del pago de comisiones semanales. Si tu deseas que NO se te retenga y hacerte cargo tu mismo de su declaración ante las autoridades, activa esta casilla.</p>
                    </div>
                     <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;"></label>
                    <div class="col-sm-3">
                    <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Actualizar</button>
                  </div>                    
                  </div>                                  
                </form>               
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="fot" style="background-color: #6c757d; color: #ffffff;">
              <h5 class="mb-0" style="color: #ffffff;">
                <a data-toggle="collapse" data-target="#foto" aria-expanded="true" aria-controls="collapseOne" style="font-size: 15px;" style="color: #ffffff;">
                  <i class="fa fa-user-circle" aria-hidden="true"></i> Fotografía
                </a>
              </h5>
            </div>
            <div id="foto" class="collapse show" aria-labelledby="fot" data-parent="#accordionExample">
              <div class="card-body">   
                <form method="POST" action="/fotoperfil/{{auth()->id()}}" enctype="multipart/form-data">                
                @csrf
                  <div class="form-group row">
                  <div class="col-sm-2">
                    &nbsp;
                  </div>
                  <div class="col-sm-4">
                    @if($usuario->avatar!=null)                      
                      <img src="/imgusers/{{$usuario->avatar}}" class="rounded-circle z-depth-1-half avatar-pic" style="width: 160px;"/>
                    @else
                      <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width: 160px;">
                      @endif
                   </div>
                  <div class="col-sm-4">
                    <br>
                    <br>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    &nbsp;
                    <div class="col-sm-112">
                    <button type="submit" class="btn btn-warning btn-block"><i class='fas fa-pencil-alt'></i> Actualizar</button>
                  </div>

                </div> 
                </form>               
              </div>
            </div>
          </div> 
      </div>
    </section>
    <!-- /.content -->
@endsection

  

