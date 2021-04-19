@extends('layouts.admin')
@section('title','Cuenta')
@section('content')
<style type="text/css" media="screen">
    a {color: white;  text-decoration: none;}
    a:hover {color: white;text-decoration: none;}
    a:visited {color: white;text-decoration: none;}
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
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
            <h4>Detalle de socio <span class="badge badge-dark">New</span></h4>
          </div>
          <div class="col-sm">
            <div class="btn-group btn-group-justified" role="group" aria-label="Basic mixed styles example">
              <button type="button" class="btn btn-secondary "><i class="fa fa-home" aria-hidden="true"></i> Inicio</button>
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
                <form>
                  <div class="form-group row">
                    <div class="form-group col-md-2">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Nombre(s)</label>
                      <input type="nombre" class="form-control" id="nombre" placeholder="Nombre(s)" readonly="">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Apellido Paterno</label>
                      <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno" readonly="">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Apellido Materno</label>
                      <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Apellido Materno" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Correo Electrónico</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="colFormLabel" placeholder="Correo Electrónico">
                    </div>
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">País</label>
                    <div class="col-sm-4">
                      <select id="pais" name="pais" class="form-control">
                        <option selected>Selecciona...</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Fecha de Nacimiento</label>
                    <div class="col-sm-4">
                      <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Fecha de Nacimiento">
                    </div>
                    <label for="colFormLabel" class="col-sm-3 col-form-label" style="text-align: right;">Entidad de Nacimiento</label>
                    <div class="col-sm-3">
                      <select id="entidad" name="entidad" class="form-control">
                        <option selected>Selecciona...</option>
                        <option>...</option>
                      </select>
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
          <div class="card" >
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
                    <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-map-marker" aria-hidden="true"></i> Editar Domicilios</button>
                  </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                  <div class="card-header">Header   <span class="badge badge-dark">51597</span></div>
                  <div class="card-body">
                    <p>GUERRILLERA No. 212 <br>Colonia Aurora Segunda Sección (Benito Juárez)<br>Nezahualcóyotl, México <br>C.P. 57000<br><strong>México</strong><br></p>
                  </div>
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
                <form>
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Contraseña Actual</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="passact" name="passact" placeholder="Contraseña Actual" readonly="">
                  </div>
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Contraseña Nueva</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña Nueva">
                  </div>                  
                </div>
                <div class="form-group row">                  
                  <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert" style="background-color:  #E4E4E4; color: black; font-size: 12px;">
                      <i class='fas fa-exclamation-circle'></i> Al cambiar la contraseña, se enviará un mensaje a la dirección de correo electrónico relacionada con la cuenta de socio.
                    </div>
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
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Fijo</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="fijo" placeholder="Fijo" readonly="">
                  </div>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Celular</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="celular" placeholder="Celular" readonly="">
                  </div>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    &nbsp;
                  </div>
                  <div class="col-sm-4">
                    <button type="button" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Número</button>
                  </div>                  
                </div>                
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
                <form>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">CURP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP">
                    </div>                                      
                  </div>
                  <hr>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Banco</label>
                    <div class="col-sm-4">
                      <select id="banco" name="banco" class="form-control">
                        <option selected>Selecciona...</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right; color: red;"><i class="fa fa-exclamation-triangle" style="color: red;" aria-hidden="true"></i> CLABE Interbancaria</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="clabe" name="clabe" placeholder="CLABE Interbancaria">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">RFC</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC">
                    </div>
                    <div class="col-sm-4">
                      <p style="font-size: 15px;"><i class="fa fa-exclamation-triangle" style="color: red;" aria-hidden="true"></i> No verificada</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align: right;">Constancia en PDF</label>
                    <div class="col-sm-4">
                        <input type="file" name="constancia">
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
                <div class="alert alert-secondary" role="alert" style="background-color:  #E4E4E4; color: black; font-size: 12px;">
                  Una vez cargada la imagen, ajusta la posición y presiona en el botón GUARDAR para que tu foto quede registrada.
                </div>
                <form>
                  <div class="form-group row">
                  <div class="col-sm-2">
                    &nbsp;
                  </div>
                  <div class="col-sm-4">
                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar" style="width: 160px;">
                  </div>
                  <div class="col-sm-4">
                    <br>
                    <br>
                    <input type="file" name="foto">
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
