@extends('layouts.admin')
@section('title','Detalles de cuenta')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">LinLife - Detalles de mi cuenta {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Detalles de mi cuenta {{$user->name}} {{$user->aPaterno}} {{$user->aMaterno}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Mis ingresos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Mis comisiones</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card">
              <div class="card-header bg-primary">
                <h3 class="card-title">Mis amigos invitados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p>Primer Nivel</p>
                <div class="progress">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="{{$porcentaje}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$porcentaje}}%">
                    <span class="sr-only">{{$porcentaje}}% completado</span>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Segundo Nivel</p>

                <div class="progress">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                       aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0% completado</span>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p>Tercer Nivel</p>

                <div class="progress">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                       aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0% completado</span>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
	</div>
	<div class="row mb-2">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Nuevos socios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Estado</th>
                      <th>Socio</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@forelse($invitados as $invitado)
                  		<tr>
	                      <td><span class="badge badge-primary">{{$invitado->status_cuenta}}</span></td>
	                      <td>{{$invitado->name}} {{$invitado->aPaterno}} {{$invitado->aMaterno}}</td>
	                      <td></td>
	                    </tr>
                  	@empty
                  	<h2>Aún no invitas a nadie a registrarse.</h2>
                  	<p>
                  		Utiliza tú código de invitación para registrar a un amigo
                  		<br>
                  		Tú código es: <strong>{{Auth::user()->code}}</strong>
                  	</p>
                  	@endforelse
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
</div>
@endsection
@section('scripts')
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script>
  $(function () {
    var areaChartCanvas = $('#lineChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre'],
      datasets: [
        {
          label               : 'Compras',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Comisiones',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    });

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>
@endsection