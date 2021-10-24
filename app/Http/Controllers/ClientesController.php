<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoumdation\Response;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id','asc')->paginate(10)->setPath('clientes')->where('estado', 1);

        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'nombre_cliente' => 'required',
            'apellido_paterno' => 'required',
            'telefono_celular' => 'required',
            'correo_electronico' => ['required','unique:cliente']
        ]); 

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente.');
    }

    /**
     * Registro rápido de cliente en servicio.
     */
    public function agregar(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'apellido_paterno' => 'required',
            'telefono_celular' => 'required',
            'correo_electronico' => ['required','unique:cliente']
        ]); 

        Cliente::create($request->all());
        return redirect()->route('servicios.create')->with('warning', 'No olvide completar la información del cliente más tarde.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente){
            return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'apellido_paterno' => 'required',
            'calle' => 'required',
            'colonia' => 'required',
            'telefono_casa'=> 'digits:10',
            'telefono_celular' => 'required|digits:10',
            'correo_electronico' => 'required'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->update('update cliente set estado = 0 where id=?', [$cliente->id]);

        return redirect()->route('clientes.index')->with('success', 'Cliente dado de baja exitosamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        $cliente->estado       = 0;
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente dado de baja exitosamente.');
    }


}
