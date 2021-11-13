@extends('layouts.app')
@section('content')
<div class="card-body">
    @if ($message = Session::get('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif    

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%; margin-top:3rem;" id="search" placeholder="Escribe para buscar">
    </div>

    <table class="table-bordered table table-responsive-lg" id="mytable" cellspacing="0">
        <thead class="table-light">
            <tr role="row">
                <th scope="col">Opciones</th>
                <th scope="col">Cliente</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Costo Estimado</th>
                <th scope="col">Personal Encargado</th>
                <th scope="col">Estado</th>                
                <th scope="col">Fecha de Asignación</th>
                <th scope="col">Fecha de Entrega</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <th scope="row">
                        <div class="row clearfix">
                            <button type="button" class="btn">
                                <a class="@if($servicio->estado == 0) btn btn-danger 
                                    @elseif($servicio->estado == 1 || $servicio->estado == 3 || $servicio->estado == 4) btn btn-primary 
                                    @elseif($servicio->estado == 2) btn btn-warning 
                                    @elseif($servicio->estado == 5) btn btn-success
                                    @endif" href="{{ route('reportes.show', $servicio) }}" role="button" title="Ver historico de servicio"><span data-feather="eye"></span></a>                                
                            </button>
                            @if($servicio->estado == 2)
                            <button type="button" class="btn">
                                <a class=" btn btn-warning " href="{{ route('servicios.solicitud', $servicio->id) }}" role="button" title="Atender Solicitud"><span data-feather="alert-circle"></span></a>                                
                            </button>  
                            @endif                                                     
                        </div>

                    </th>
                    <td>{{ $servicio->ordenServicio->cliente->nombre_cliente}} {{ $servicio->ordenServicio->cliente->apellido_paterno}}</td>
                    <td>{{ $servicio->dispositivo->nombre_dispositivo}}</td>
                    <td>{{ $servicio->ordenServicio->costo_estimado }}</td>
                    <td>@if($servicio->seguimientoOrden->personal_asignado_id === 0)No se ha asignado personal @else{{ $servicio->seguimientoOrden->personal_asignado->name }}@endif</td> 
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
                    <td>{{ $servicio->seguimientoOrden->fecha_asignacion->format('d-m-Y') }}</td>
                    <td>{{ $servicio->seguimientoOrden->fecha_entrega_final->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
     $("#search").keyup(function(){
         _this = this;
         $.each($("#mytable tbody tr"), function() {
             if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
             else
             $(this).show();
             });
             });
             });
</script>

@endsection