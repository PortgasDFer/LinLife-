@extends('layouts.admin')
@section('title','Existencias')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Existencia de productos </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Existencia de productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid"> 
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SKU</th>
                <th>Nombre del producto</th>
                <th>Cantidad en inventario</th>
                <th>Ultimo ingreso</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td>121464542154</td>
                  <td>Producto 1</td>
                  <td>25 unidades</td>
                  <td>09/03/2021</td>
                  <td>
                    <button class="btn btn-success">Ingreso</button>
                    <button class="btn btn-primary">Promociones</button>
                  </td>  
                </tr>
                <tr>
                  <td>121464542154</td>
                  <td>Producto 2</td>
                  <td>2 unidades</td>
                  <td>09/03/2021</td>
                  <td>
                    <button class="btn btn-success">Ingreso</button>
                    <button class="btn btn-primary">Promociones</button>
                  </td>  
                </tr>
                <tr>
                  <td>121464542154</td>
                  <td>Producto 3</td>
                  <td>10 unidades</td>
                  <td>09/03/2021</td>
                  <td>
                    <button class="btn btn-success">Ingreso</button>
                    <button class="btn btn-primary">Promociones</button>
                  </td>  
                </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>SKU</th>
                <th>Nombre del producto</th>
                <th>Cantidad en inventario</th>
                <th>Ultimo ingreso</th>
                <th>Acciones</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
@endsection