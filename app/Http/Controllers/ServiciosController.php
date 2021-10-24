<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\OrdenServicio;
use App\Models\Personal;
use App\Models\SeguimientoOrden;
use App\Models\Cliente;
use App\Models\TipoDispositivo;
use App\Models\EstadoDispositivo;
use App\Models\Software;
use App\Models\Dispositivo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Symfony\Component\HttpFoumdation\Response;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::all();

        return view("servicios.index", compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::where('estado', '1')->get();
        $tipodispositivos = TipoDispositivo::all();
        return view('servicios.create',array(
            'clientes' => $clientes,
            'tipodispositivos' => $tipodispositivos
        ));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            #CREACIÓN DE OBJETO ESTADO DISPOSITIVO
            $estadoDisp = new EstadoDispositivo();
            $estadoDisp->enciende = $request->input('enciende');
            $estadoDisp->colores_correctos = $request->input('colores_correctos');
            $estadoDisp->botones_completos = $request->input('botones_completos');
            $estadoDisp->golpeado = $request->input('golpeado');
            $estadoDisp->condiciones_fisicas = $request->input('condiciones_fisicas');
            $estadoDisp->sistema_operativo = $request->input('sistema_operativo');
            $estadoDisp->contrasenia = $request->input('contrasenia');

            #CREACIÓN DE OBJETO SOFTWARE
            $softwareList = new Software();
            $softwareList->nombre_software = $request->input('nombre_software');
            $softwareList->licencia = $request->input('licencia');
            $estadoDisp->save();
            $softwareList->save();

            #obtenemos los id del software y estado dispositivo
            $idEstadoDisp = $estadoDisp->id;
            $idSoftware = $softwareList->id;
            

            #CREACIÓN DE OBJETO DISPOSITIVO
            $dispositivo = new Dispositivo();
            $dispositivo->numSerie = $request->input('numSerie');
            $dispositivo->nombre_dispositivo = $request->input('nombre_dispositivo');
            $dispositivo->marca = $request->input('marca');
            $dispositivo->modelo = $request->input('modelo');
            $dispositivo->estado = 1;
            $dispositivo->tipoDispositivo_id = $request->input('tipoDispositivo_id');
            $dispositivo->estadoDispositivo_id = $idEstadoDisp;
            $dispositivo->software_id = $idSoftware;
            $dispositivo->save();
            

            #CREACIÓN DE OBJETO ORDEN DE SERVICIO
            $orden = new OrdenServicio();
            $orden->diagnostico_rapido = $request->input('diagnostico_rapido');
            $orden->costo_estimado = $request->input('costo_estimado');
            $orden->cliente_id = $request->input('cliente_id');
            $orden->save();

            #CREACIÓN DE OBJETO SEGUIMIENTO ORDEN
            $fecha = Carbon::now();
            $seguimiento = new SeguimientoOrden();
            $seguimiento->fecha_asignacion = $fecha;
            $seguimiento->fecha_entrega = $request->input('fecha_entrega');
            $seguimiento->users_id = auth()->user()->id;
            $seguimiento->save();

            #obtenemos el id de la orden de servicio, dispositivo y seguimiento
            $idOrdendeServicio = $orden->id;
            $idSeguimiento = $seguimiento->id;
            $idDispositivo = $dispositivo->id;

            #CREACIÓN DE OBJETO SERVICIO
            $servicioCompleto = new Servicio();
            $servicioCompleto->estado = 1;
            $servicioCompleto->ordenServicio_id = $idOrdendeServicio;
            $servicioCompleto->ordenSeguimiento_id = $idSeguimiento;
            $servicioCompleto->dispositivo_id = $idDispositivo;
            $servicioCompleto->save();

            #obtenemos el id del servicio completo
            $idServicio = $servicioCompleto->id;

            #GENERAR EL PDF DEL RESUMEN
            $servicios = Servicio::find($idServicio);
            $view = \View::make('impresiones.imprimir', compact('servicios'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            return $pdf->download('informe'.'.pdf');
        }catch (\Throwable $th) {
            $mensaje = $th;
        }
        return $mensaje; 
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicios)
    {     
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        //
        return view("servicios.show", compact ('servicios'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        $cliente = Cliente::where('id', $servicio->ordenServicio->cliente_id)->first();
        $dispositivo = Dispositivo::where('id',$servicio->dispositivo->id)->first();
        $fecha_entrega = Str::substr($servicio->seguimientoOrden->fecha_entrega, 0, 10);#Obtenemos el valor de la fecha y eliminamos los valores no necesarios
        return view("servicios.edit",compact('servicio','cliente','dispositivo','fecha_entrega'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        #CREACIÓN DE OBJETO ESTADO DISPOSITIVO
        $estadoDisp = EstadoDispositivo::find($servicio->dispositivo->estadoDispositivo->id);
        $estadoDisp->enciende = $request->input('enciende');
        $estadoDisp->colores_correctos = $request->input('colores_correctos');
        $estadoDisp->botones_completos = $request->input('botones_completos');
        $estadoDisp->golpeado = $request->input('golpeado');
        $estadoDisp->condiciones_fisicas = $request->input('condiciones_fisicas');
        $estadoDisp->sistema_operativo = $request->input('sistema_operativo');
        $estadoDisp->contrasenia = $request->input('contrasenia');
        $estadoDisp->save();      
        #ACTUALIZAR OBJETO SOFTWARE
        $software = Software::find($servicio->dispositivo->software->id);
        $software->nombre_software = $request->input('nombre_software');
        $software->licencia = $request->input('licencia');
        $software->save();                     
        #ACTUALIZAR OBJETO ORDEN DE SERVICIO
        $orden = OrdenServicio::find($servicio->ordenServicio->id);
        $orden->diagnostico_rapido = $request->input('diagnostico_rapido');
        $orden->costo_estimado = $request->input('costo_estimado');
        $orden->save();        
        #ACTUALIZAR OBJETO SEGUIMIENTO ORDEN
        $seguimiento = SeguimientoOrden::find($servicio->seguimientoOrden->id);
        $seguimiento->fecha_entrega = $request->input('fecha_entrega');
        $seguimiento->users_id = auth()->user()->id;
        $seguimiento->save();        
        #ACTUALIZAR OBJETO SERVICIO
        $servicioCompleto = Servicio::find($servicio->id);
        $servicioCompleto->save();        
        return redirect()->route('servicios.index')->with('updated', 'Servicio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
    public function printOrder(Servicio $servicio)
    {

    }    
}

