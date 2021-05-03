@extends('layouts.admin')
@section('scripts-header')
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/main.css')}}">
@endsection
@section('title','Semana')
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
	    <h1 class="m-0">LinLife - Inicio </h1>
	  </div><!-- /.col -->
	  <div class="col-sm-6">
	    <ol class="breadcrumb float-sm-right">
	      <li class="breadcrumb-item"><a href="#">Home</a></li>
	      <li class="breadcrumb-item active">Lin Life</li>
	    </ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    <div class="col-md-3">
        <div class="sticky-top mb-3">
          <div class="card">
            <div class="card-header bg-primary">
              <h4 class="card-title">Resumen de ventas</h4>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                Esta semana
              </div>
              <div class="table-responsive">  
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>Comisiones</b></td>
                      <td></td>
                    </tr>
                    <tr>  
                      <td><b>Bono</b></td>
                      <td></td>
                    </tr> 
                    <tr>  
                      <td><b>Subtotal</b></td>
                      <td></td>
                    </tr> 
                    <tr>  
                      <td><b>Retención</b></td>
                      <td></td>
                    </tr> 
                    <tr>
                      <td><b>Total</b></td>
                      <td>   </td>
                    </tr>
                  </tbody>
                </table>
              </div>      
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
<!-- Page specific script -->
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/fullcalendar/main.js')}}"></script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
@endsection