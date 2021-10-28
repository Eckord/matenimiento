@extends('layouts.app')

@section('content')
<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-body bg-light">
          <h5 class="card-title">CLIENTES</h5>
          <p class="card-text">Agrega clientes rápida y fácilmente.</p>
          
          <div class="d-grid gap-2">
            <a class="btn btn-primary float-right my-3" href="{{ route('clientes.index')}}" role="button"><span data-feather="users"></span> Clic aquí</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-body bg-light">
          <h5 class="card-title">REFACCIONES</h5>
          <p class="card-text">Ten un inventario de las refacciones que adquieres.</p>
          <div class="d-grid gap-2">
            <a class="btn btn-primary float-right my-3" href="{{ route('refacciones.index')}}" role="button"><span data-feather="layers"></span> Clic aquí</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-body bg-light">
          <h5 class="card-title">SERVICIOS</h5>
          <p class="card-text">Crea, controla y ten un seguimiento de los servicios registrados.</p>
          
          <div class="d-grid gap-2">
            <a class="btn btn-primary float-right my-3" href="{{ route('servicios.index')}}" role="button"><span data-feather="monitor"></span> Clic aquí</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-body bg-light">
          <h5 class="card-title">MANTENIMIENTO</h5>
          <p class="card-text">Realiza el mantenimiento de los equipos registrados.</p>
          <div class="d-grid gap-2">
            <a class="btn btn-primary float-right my-3" href="#" role="button"><span data-feather="bar-chart-2"></span> Clic aquí</a>
          </div>
        </div>
      </div>
    </div>
    <hr>    
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-body bg-light">
          <h5 class="card-title">REPORTES</h5>
          <p class="card-text">Analiza y toma decisiones con base a los reportes generados.</p>
          <div class="d-grid gap-2">
            <a class="btn btn-primary float-right my-3" href="{{ route('refacciones.index')}}" role="button"><span data-feather="bar-chart-2"></span> Clic aquí</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!------------>
  

@endsection

