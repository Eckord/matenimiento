@extends('layouts.app')
@section('styles')
	<style>
        table {
            font-family: arial;
            border-collapse: collapse;
            width:100%;
        }
        td,th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        textarea {
            font-family: arial;
        }
        .licencia {
            color: red;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 30px; /* Should be removed. Only for demonstration */
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .subraya {
            text-decoration: underline;
        }
        p {
            text-align: justify;
        }

        h2 {
            text-align: center;
        }
        .centro {
            text-align: center;
        }

	</style>
@endsection
@section('content')
@section('content')
        <a class="btn btn-primary float-right my-3" href="{{ route('servicios.index')}}" role="button"><span data-feather="chevron-left"></span> Regresar</a> 
    <div class="form-card">
        <h2>RESUMEN DE ORDEN</h2>     	
            <div class="container">
                <label>CLIENTE: {{$servicios->ordenServicio->cliente->nombre_cliente." ".$servicios->ordenServicio->cliente->apellido_paterno." ".$servicios->ordenServicio->cliente->apellido_materno }}</label>  
                <hr>
                <label>TIPO DE DISPOSITIVO: {{ $servicios->dispositivo->tipoDispositivo->tipo_dispositivo }}</label>
                <hr>
                <label> DATOS DEL DISPOSITIVO: </label> <br>
                <table>
                    <thead>
                        <tr role="row">
                            <th scope="col">Atributo</th>
                            <th scope="col">Descripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Núm serie</td>
                                <td>{{ $servicios->dispositivo->numSerie }}</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>{{ $servicios->dispositivo->nombre_dispositivo}}</td>
                            </tr>
                            <tr>
                                <td>Marca</td>
                                <td>{{ $servicios->dispositivo->marca}}</td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td>{{ $servicios->dispositivo->modelo}}</td>
                            </tr>
                    </tbody>
                </table>
                <hr>
                <label>SOFTWARE EN EQUIPO: </label><br>
                <textarea disabled>{{ $servicios->dispositivo->software->nombre_software }} </textarea>
                @if ($servicios->dispositivo->software->licencia == 1 ) 
                    <label class="licencia">* TIENE LICENCIA EN TODO EL SOFTWARE ENLISTADO</label>
                @else
                    <label class="licencia">* NO TIENE LICENCIA EN NINGUN SOFTWARE</label>
                @endif

                <hr>
                <label> ESTADO DEL DISPOSITIVO: </label> <br><br>
                <table>
                    <thead>
                        <tr role="row">
                            <th scope="col">Característica</th>
                            <th scope="col">Estado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>¿Enciende?</td>
                                @switch(true)
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 1)
                                        <td>ENCIENDE CORRECTAMENTE</td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 2)
                                        <td>NO APLICA A ESTE DISPOSITIVO </td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 0)
                                        <td>NO ENCIENDE</td>
                                        @break
                                @endswitch
                            </tr>
                            <tr>
                                <td>¿Colores correctos?</td>
                                @switch(true)
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 1)
                                        <td>COLORES CORRECTOS</td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 2)
                                        <td>NO APLICA A ESTE DISPOSITIVO </td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 0)
                                        <td>COLORES INCORRECTOS</td>
                                        @break
                                @endswitch
                            </tr>
                            <tr>
                                <td>¿Botones completos?</td>
                                @if ($servicios->dispositivo->estadoDispositivo->botones_completos  == 1 )
                                    <td>BOTONES COMPLETOS</td>
                                @else 
                                    <td>BOTONES INCOMPLETOS</td>
                                @endif
                            </tr>
                            <tr>
                                <td>¿Se encuentra golpeado?</td>
                                @if ($servicios->dispositivo->estadoDispositivo->golpeado  == 1 )
                                    <td>SE ENCUENTRA GOLPEADO</td>
                                @else
                                    <td>NO SE ENCUENTRA GOLPEADO</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Condiciones físicas</td>
                                <td>{{ $servicios->dispositivo->estadoDispositivo->condiciones_fisicas }}</td>
                            </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="column">
                        <label>SISTEMA OPERATIVO: </label><label class="subraya">{{ $servicios->dispositivo->estadoDispositivo->sistema_operativo }}</label>
                    </div>
                    <div class="column">
                        <label>CONTRASEÑA DEL EQUIPO: </label><label class="subraya">{{ $servicios->dispositivo->estadoDispositivo->contrasenia }}</label>
                    </div>
                </div>
                <hr>
                <label>DIAGNÓSTICO INICIAL: </label><br>
                <textarea type="text" id="diagnostico_rapido2" rows="5" cols="20" disabled>{{ $servicios->ordenServicio->diagnostico_rapido }}</textarea>
                <div class="row">
                    <div class="column">
                        <label>FECHA ENTREGA: {{ $servicios->seguimientoOrden->fecha_entrega->format('d-m-Y') }}</label>
                    </div>
                    <div class="column">
                        <label style="color:red;">COSTO ESTIMADO: $ {{ $servicios->ordenServicio->costo_estimado }}</label><br>
                        <label style="color:red;">COSTO FINAL: $ 
                            @if(isset( $mantenimiento->costo_final))
                                {{ $$mantenimiento->costo_final }}
                            @else
                                {{ $servicios->ordenServicio->costo_estimado }}
                            @endif
                        </label>
                    </div>
                </div>
                <input type="submit" name="imprimir" name="imprimir" value="Reimprimir Orden" onclick="{{ route('imprimir') }}" />
                </div>                
            </div>	
@endsection