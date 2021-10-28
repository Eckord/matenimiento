<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Servicio;
use App\Models\MantenimientoPrev;
use App\Models\MantenimientoCorrect;
use App\Models\OrdenServicio;
use App\Models\Personal;
use App\Models\SeguimientoOrden;
use App\Models\Cliente;
use App\Models\TipoDispositivo;
use App\Models\EstadoDispositivo;
use App\Models\Software;
use App\Models\Dispositivo;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Symfony\Component\HttpFoumdation\Response;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class MantenimientoController
 * @package App\Http\Controllers
 */
class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /*
    *Obtenemos el id de los seguimientos de orden donde el id de personal sea el que esta activo
    */
        $obtenerSeguimientos = SeguimientoOrden:: where('personal_asignado_id', auth()->user()->id)->get();

        $mantenimientos = Mantenimiento::paginate();
    /*
    *Obtenemos solo los servicios que tengan el id de seguimiento de orden del personal activo
    */        
        foreach ($obtenerSeguimientos as $obtenerSeguimiento) {
                    $servicios = Servicio:: where('ordenSeguimiento_id', $obtenerSeguimiento->id )->get();
        }
        return view('mantenimiento.index', compact('mantenimientos','servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $mantenimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mantenimiento = new Mantenimiento();
        return view('mantenimiento.create', compact('mantenimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            #CREACIÓN DE OBJETO MANTENIMIENTOPREV
            $mantenimientoprev = new MantenimientoPrev;
            $mantenimientoprev->actividad = $request->input('actividad');
            $mantenimientoprev->descripcion = $request->input('descripcionActividad');
            $mantenimientoprev->insumos_utilizados = $request->input('insumosUtilizados');
            $mantenimientoprev->estado = 1;
            $mantenimientoprev->save();
            #CREACIÓN DE OBJETO MANTENIMIENTOCORRECT
            $mantenimientocorrect = new MantenimientoCorrect;
            $mantenimientocorrect->software_actual = $request->input('softwareActual');
            $mantenimientocorrect->hardware_actual = $request->input('hardwareActual');
            $mantenimientocorrect->estado = 1;
            $mantenimientocorrect->save();
            #OBTENEMOS LOS IDS DE MANTENIMIENTO PREVENTIVO Y CORRECTIVO
            $idMantPrev = $mantenimientoprev->id;
            $idMantCorrect = $mantenimientocorrect->id;
            #CREACIÓN DE OBJETO MANTENIMIENTO
            $servicio= Servicio::find($request->input('servicio_id'));
            $mantenimiento = new Mantenimiento;
            $mantenimiento->costo_final= $request->input('costoFinal'); 
            $mantenimiento->mantPrev_idMantPrevent = $idMantPrev;
            $mantenimiento->mantCorrect_idMantCorrect = $idMantCorrect;
            $mantenimiento->servicio_id= $request->input('servicio_id');
            if ($request->input('vista') == 2) {
                $mantenimiento->estado = 5;
                $servicio->estado = 5;
            }            
            elseif ($request->input('vista') == 1) {
                $mantenimiento->estado = 2;
                $servicio->estado = 2;
            }
            $mantenimiento->save();
            $servicio->save();

        }catch (\Throwable $th) {
            $mensaje = $th;
        }
        //return $mensaje;
        return redirect()->route('mantenimiento.index')->with('success', 'Mantenimiento registrado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($servicioId)
    {
        $mantenimientos = Mantenimiento::where('servicio_id', $servicioId)->get();
        $servicios = Servicio::find($servicioId);
        return view('mantenimiento.show', compact('mantenimientos', 'servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        $fecha_entrega = Str::substr($servicio->fecha_entrega_final, 0, 10);

        return view('mantenimiento.edit', compact('servicio', 'fecha_entrega'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mantenimiento $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $servicio = Servicio::find($id); 
        $mantenimiento = Mantenimiento::where('servicio_id', $id)->first()
        ->where('estado', 3)->first();
        $servicio->estado=5;
        $mantenimiento->estado=5;
        $servicio->save();
        $mantenimiento->save();
        return redirect()->route('mantenimiento.index')
            ->with('success', 'Mantenimiento Terminado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::find($id)->delete();

        return redirect()->route('mantenimiento.index')
            ->with('success', 'Mantenimiento deleted successfully');
    }
    public function solicitar($id)
    {
        $servicio = Servicio::find($id);
        $fecha_entrega = Str::substr($servicio->fecha_entrega_final, 0, 10);
        $mantenimiento = Mantenimiento::where('servicio_id',$id)->first();

        return view('mantenimiento.edit', compact('mantenimiento', 'servicio', 'fecha_entrega'));
    }    
}
