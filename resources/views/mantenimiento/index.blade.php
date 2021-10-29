@extends('layouts.app')
@section('content')   
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            <input type="text" class="form-control pull-right" style="width:100%; margin-top:3rem;" id="search" placeholder="Escribe para buscar">
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Estado:(mantenimiento)</th>
                                        <th>Diagnóstico inicial</th>                                        

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>
                                                @if($servicio->estado>2)
                                                <button type="button" class="btn">
                                                    <a class="@if($servicio->estado === 4) btn btn-danger 
                                                        @elseif($servicio->estado >=1 && $servicio->estado<=2) btn btn-warning 
                                                        @elseif($servicio->estado === 3) btn btn-primary 
                                                        @elseif($servicio->estado === 5) btn btn-success
                                                        @endif" href="{{ route('mantenimiento.show', $servicio->id) }}" role="button" title="Ver historico de mantenimiento"> <span data-feather="eye"></span></a>
                                                </button>   
                                                @endif  
                                                @if($servicio->estado<5)                                           
                                                <button type="button" class="btn">
                                                    <a class="@if($servicio->estado === 4) btn btn-danger 
                                                        @elseif($servicio->estado >=1 && $servicio->estado<=2) btn btn-warning 
                                                        @elseif($servicio->estado === 3) btn btn-primary
                                                        @elseif($servicio->estado === 5) btn btn-success 
                                                        @endif" href="{{ route('mantenimiento.edit', $servicio->id) }}" role="button" title="Realizar Mantenimiento"> <span data-feather="settings"></span></a>
                                                </button>                                                  
                                                <button type="button" class="btn">
                                                    <a class="@if($servicio->estado === 4) btn btn-danger 
                                                        @elseif($servicio->estado >=1 && $servicio->estado<=2) btn btn-warning 
                                                        @elseif($servicio->estado === 3) btn btn-primary
                                                        @elseif($servicio->estado === 5) btn btn-success 
                                                        @endif" href="{{ route('mantenimiento.request', $servicio->id) }}" role="button" title="Solicitar Autorización"> <span data-feather="edit-3"></span></a>
                                                </button>  
                                                @endif                                                
                                            </td>                                            
                                                 @switch(true)
                                                     @case($servicio->estado  == 1)
                                                         <td>SERVICIO ASGINADO</td>
                                                         @break
                                                     @case($servicio->estado  == 2)
                                                         <td>PENDIENTE DE APROBACIÓN </td>
                                                         @break
                                                     @case($servicio->estado  == 3)
                                                         <td>COTIZACIÓN APROBADA</td>
                                                         @break
                                                     @case($servicio->estado  == 4)
                                                         <td>COTIZACIÓN RECHAZADA PROCEDA CON EL MANTENIMIENTO INICIAL</td>
                                                         @break
                                                     @case($servicio->estado  == 5)
                                                         <td>SERVICIO TERMINADO</td>
                                                         @break                                                                                                                  
                                                 @endswitch                                                
                                            <td>{{ $servicio->ordenServicio->diagnostico_rapido }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
