@extends('layouts.admin')
@section('title','Mes')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Ingresos del mensuales </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Ingresos mensuales {{Auth::user()->name}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
       <div class="card">
        <canvas id="myChart"></canvas>        
      </div>
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Comisiones</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <div class="card-body">                
          <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
          </div>

          <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
              <i class="fas fa-square text-primary"></i> Comisión ($)
            </span>

            <span>
              <i class="fas fa-square text-gray"></i> Porcentaje de Comisión
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-lg-12">
      <div class="alert alert-warning alert-dismissible progress-bar-striped">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> ¡ATENCIÓN!</h5>
      Estas cantidades no incluyen el cargo por I.S.R. que se aplica al momento de transferir el pago semanal a tu cuenta bancaria.
      </div> 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-primary">
          Tabla de ingresos 2021 (Mes actual {{$dt->monthName}})
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" style="width:100%">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Mes</th>
                  <th scope="col">Compras de mi red</th>
                  <th scope="col">Comisiones</th>
                  <th scope="col">Bono</th>
                  <th scope="col">TOTAL</th>
                </tr>
              </thead>
              <tbody>
                
                <tr id="{{$dt->monthName}}">
                  <td>{{$dt->monthName}}</td>
                  <td>{{$numComisiones}}</td>
                  <td>${{number_format($totalComisiones, 2)}}</td>
                  <td>$0.00</td>
                  <td>${{number_format($totalComisiones, 2)}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>            
  </div>
</div> 
<form action="POST" action="/grafica" id="formgrafica">
      @csrf
      <input type="hidden" name="id" value="1"/>      
    </form>
@endsection
@section('scripts')
<script>
  const monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio","julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
  const d = new Date();
  var fila = document.getElementById(monthNames[d.getMonth()]);
  fila.className = 'bg-success'; 
</script>
<script>
  $(document).ready(function(){

    var comisiones=[];
    var valores=[];

    $.ajax({
      url:'/grafica',
      method:'POST',
      data:$("#formgrafica").serialize(),
    }).done(function(res){
      var arreglo = JSON.parse(res);
      console.log(arreglo);
      for (var x=0; x<arreglo.length;x++) {
          var todo= arreglo[x].id_comision;
          todo+=arreglo[x].total_comision;
          todo+=arreglo[x].fecha;
          comisiones.push(arreglo[x].total_comision);
          valores.push(arreglo[x].fecha);
      }
        generarGrafica();
    });    
  

  function generarGrafica(){
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
      labels: valores,
      datasets: [{
          label: '$ Comisión Generada',
          data: comisiones,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
      }]
  },
  options: {
      scales: {
          y: {
              beginAtZero: true
          }
      }
    }
  });
}  
});
</script>
<script>
$(document).ready(function(){

    var comisiones=[];
    var valores=[];
    var porcentaje=[];

    $.ajax({
      url:'/grafica',
      method:'POST',
      data:$("#formgrafica").serialize(),
    }).done(function(res){
      var arreglo = JSON.parse(res);
      console.log(arreglo);
      for (var x=0; x<arreglo.length;x++) {
          var todo= arreglo[x].id_comision;
          todo+=arreglo[x].total_comision;
          todo+=arreglo[x].fecha;
          todo+=arreglo[x].porcentaje;
          comisiones.push(arreglo[x].total_comision);
          valores.push(arreglo[x].fecha);
          porcentaje.push(arreglo[x].porcentaje);
      }
        generarGrafica();
    }); 

     function generarGrafica(){
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: valores,
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: comisiones
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: porcentaje
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
}  
}); 

</script>
@endsection