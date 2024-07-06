<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\VehiculoRequest;


class VehiculosController extends Controller
{
    public function index()
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        $tipos = Tipo::all();
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact(['vehiculos', 'tipos']));
    }


    public function create()
    {
        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        $tipos = Tipo::all();
        return view('vehiculos.create', compact('tipos'));
    }


    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->patente = $request->patente;
        $vehiculo->marca = $request->marca;
        $vehiculo->anio = $request->anio;
        $vehiculo->tipo_id = $request->tipo;
        $vehiculo->estado = 'Disponible';

        $vehiculo->save();
        return redirect()->route('vehiculos.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Vehiculo $vehiculo)
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        $opciones = ['Disponible','Arrendado','De baja', 'En mantenimiento'];

        $tipos = Tipo::all();
        return view('vehiculos.edit', compact(['vehiculo', 'tipos', 'opciones']));
    }


    public function update(Request $request, Vehiculo $vehiculo)
    {
        if(Gate::denies('usuarios-gestion')){
            $vehiculo->estado = $request->estado;
            $vehiculo->save();
            return redirect()->route('vehiculos.index');
        }

        $vehiculo->marca = $request->marca;
        $vehiculo->anio = $request->anio;
        $vehiculo->tipo_id = $request->tipo;
        $vehiculo->estado = $request->estado;
        $vehiculo->save();
        return redirect()->route('vehiculos.index');
    }


    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->load('arriendos');
        $arriendosConDevolucion = $vehiculo->arriendos->where('fecha_devolucion', '=', null);

        if($arriendosConDevolucion->isNotEmpty()){
            return back()->withErrors([
                'error_message' => "El vehiculo {$vehiculo->patente} tiene arriendos pendientes con fecha de devolución.",
            ]);
        }

        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
