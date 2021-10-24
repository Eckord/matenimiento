<?php

namespace App\Http\Controllers;

use App\Models\Refaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Symfony\Component\HttpFoumdation\Response;

class RefaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refacciones = Refaccion::orderBy('numSerie','asc')->paginate(10)->setPath('refacciones')->where('estado', 1);

        return view('refacciones.index', compact(['refacciones']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('refacciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numSerie' => ['required','unique:refacciones'],
            'nombre_refaccion' => 'required',
            'descripcion' => 'required',
            'costo' => 'required'
        ]); 

        Refaccion::create($request->all());

        return redirect()->route('refacciones.index')->with('success', 'Refacción registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refaccion  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function show($numSerie)
    {
        $refaccion = Refaccion::where('numSerie', $numSerie)->update([
            'estado' => 0,
        ]);

        return redirect()->route('refacciones.index')->with('success', 'Refacción dada de baja exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refaccion  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function edit($numSerie)
    {
        $refaccion = Refaccion::where('numSerie',$numSerie)->first();
        return view('refacciones.edit', compact('refaccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refaccion  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $refaccion = Refaccion::where('numSerie', $request->input('numSerie'))->update([
            'nombre_refaccion' => $request->input('nombre_refaccion'),
            'descripcion' => $request->input('descripcion'),
            'costo' => $request->input('costo')
        ]);

        return redirect()->route('refacciones.index')->with('success', 'Refacción actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refaccion  $refaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $refaccion = Refaccion::where('numSerie',$request->input('refaccionNumSerie'));
        $refaccion->update([
            'estado' => $request->input('estado')
        ]);

        return redirect()->route('refacciones.index')->with('success', 'Refacción dada de baja exitosamente.');
    }
}

