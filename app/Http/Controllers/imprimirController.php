<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class imprimirController extends Controller
{
    public function imprimir() {
        $servicios = Servicio::find(1);
            $view = \View::make('impresiones.imprimir', compact('servicios'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('informe'.'.pdf');
    }
}
