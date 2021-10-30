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
use App\Models\User;
use App\Models\Mantenimiento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Symfony\Component\HttpFoumdation\Response;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReportesController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        $mantenimientos = Mantenimiento::all();
        return view ("reportes.index", compact('servicios','mantenimientos'));
    }
    public function show($id)
    {
        $servicios = Servicio::find($id);
        $mantenimientos = Mantenimiento::where('servicio_id', $id)->get();
        if ($servicios->estado == 5) {
            $mantenimiento = Mantenimiento::where('servicio_id', $servicios->id)
            ->where('estado', 5)->first();
        }else{
            $mantenimiento = new Mantenimiento;
        }
        $usuarios = User::all();        
        return view("reportes.show", compact('servicios','usuarios', 'mantenimiento','mantenimientos'));
    }
}
