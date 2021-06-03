@extends('layouts.admin')
@section('title','Mes')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Inicio </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
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
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Ventas</h3>                  
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Ventas a lo largo del tiempo</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="250"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Compras
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Comisiones
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
            <table class="table">
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
                <tr id="enero">
                  <td>Enero</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr id="febrero">
                <tr>
                  <td>Febrero</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="marzo">
                  <td>Marzo</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="abril">
                  <td>Abril</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="mayo">
                  <td>Mayo</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="junio">
                  <td>Junio</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="julio">
                  <td>Julio</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="agosto">
                  <td>Agosto</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="septiembre">
                  <td>Septiembre</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="octubre">
                  <td>Octubre</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="noviembre">
                  <td>Noviembre</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
                <tr id="diciembre">
                  <td>Diciembre</td>
                  <td>0</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>          
  </div>
</div> 
@endsection
@section('scripts')
<script>
  const monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio","julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
  const d = new Date();
  var fila = document.getElementById(monthNames[d.getMonth()]);
  fila.className = 'bg-success';
</script>

<script>
  $(function () {
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
      labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000, 3000, 2500, 2700, 2500, 3000]
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: [700, 1700, 2700, 2000, 1800, 1500, 2000, 2700, 2000, 1800, 1500, 2000]
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

  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type: 'line',
        data: [100, 120, 170, 167, 180, 177, 160],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type: 'line',
        data: [60, 80, 70, 67, 80, 77, 100],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
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
            suggestedMax: 200
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
})

</script>
@endsection