<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Arriendo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ClienteRequest;


class ClientesController extends Controller
{

    public function index()
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }


        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        //
    }


    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente();

        $cliente->rut = $request->rut;
        $cliente->nombre = $request->nombre;
        $cliente->fecha_nac = $request->fecha_nac;

        $cliente->save();
        return redirect()->route('clientes.index');
    }


    public function show(Cliente $cliente)
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        return view('clientes.show', compact('cliente'));
    }


    public function edit(Cliente $cliente)
    {

        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        $cliente->nombre = $request->nombre;
        $cliente->fecha_nac = $request->fecha_nac;

        $cliente->save();
        return redirect()->route('clientes.index');
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->load('arriendos'); //cargar relacion con arriendo
        $arriendosConDevolucion = $cliente->arriendos->where('fecha_devolucion', '=', null);

        if($arriendosConDevolucion->isNotEmpty()){
            return back()->withErrors([
                'error_message' => "El cliente {$cliente->rut} tiene arriendos pendientes con fecha de devolución.",
            ]);
        }
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
