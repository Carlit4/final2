<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Arriendo;

use App\Http\Requests\ArriendoRequest;

use Illuminate\Support\Facades\Gate;

use Carbon\Carbon;

class ArriendosController extends Controller
{
    public function index()
    {
        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }
        $vehiculos = Vehiculo::all();
        $arriendos = Arriendo::all();


        return view('arriendos.index',compact(['vehiculos','arriendos']));
    }



    public function create(Request $request)
    {
        //

    }


    public function store(Request $request)
    {
        $fechainicio = Carbon::parse($request->fecha_ini);
        $fechatermino = Carbon::parse($request->fecha_ter);
        $horainicio = Carbon::createFromFormat('H:i', $request->hora_inicio);
        $horatermino = Carbon::createFromFormat('H:i', $request->hora_termino);



        if($fechatermino>$fechainicio){
            $arriendo = new Arriendo();

            $arriendo->rut_cliente = $request->rut_cliente;
            $arriendo->patente_vehiculo = $request->patente_vehiculo;
            $arriendo->fecha_inicio = $fechainicio;
            $arriendo->hora_inicio  = $horainicio;
            $arriendo->fecha_termino = $fechatermino;
            $arriendo->hora_termino = $horatermino;
            $arriendo->imagen_entrega = $request->file('img_ent')->store('public/arriendos');

            $arriendo->save();

            $vehiculo = Vehiculo::where('patente', $request->patente_vehiculo)->first();
            $vehiculo->estado = 'Arrendado';

            $vehiculo->save();

            return redirect()->route('arriendos.index');

        }else{

            return back()->withErrors([
                'error_message' => "La fecha de termino es invalida!",
            ]);
        }

    }



    public function devolustore(Request $request)
    {   

        $arriendo = Arriendo::where('fecha_devolucion', null)
               ->where('patente_vehiculo', $request->patente_vehiculo)
               ->first(); // Utilizamos first() en lugar de get() para obtener un único resultado

        if ($arriendo) {
            // Parsear la fecha y hora de devolución
            $fechadevolucion = Carbon::parse($request->fecha_devolucion);
            $horadevolucion = Carbon::createFromFormat('H:i', $request->hora_devolucion);

            if ($fechadevolucion<($arriendo->fecha_inicio)){
                return back()->withErrors('La fecha de devolucion es incorrecta!!')->onlyInput('fecha_ter');
            }
    
            $arriendo->fecha_devolucion = $fechadevolucion;
            $arriendo->hora_devolucion = $horadevolucion;
            $arriendo->imagen_recepcion = $request->file('img_rec')->store('public/arriendos');;

            // Guardar los cambios
            $arriendo->save();


        } else {
            dd('No se encontró ningún arriendo para devolver');
        }

        $vehiculo = Vehiculo::where('patente', $request->patente_vehiculo)->first();

        if ($vehiculo) {
            $vehiculo->estado = 'Disponible';
            $vehiculo->save();
        } else {
            return redirect()->route('arriendos.index')->withErrors('Vehículo no encontrado.');
        }
        return redirect()->route('arriendos.index');
    }



    public function show(Arriendo $arriendo)
    {   

        if ($arriendo->fecha_devolucion <> Null){
            $fecha_inicio = Carbon::Parse($arriendo->fecha_inicio);
            $fecha_devolucion = Carbon::Parse($arriendo->fecha_devolucion);

            $dias = $fecha_inicio->diffInDays($fecha_devolucion);

            $total = $dias * $arriendo->vehiculo->tipo->precio;

            return view('arriendos.show',compact(['arriendo', 'total','dias']));
        }

        
        return view('arriendos.show', compact('arriendo'));
    }

    public function mostrar(string $id){
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function arrendar(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();

        return view('arriendos.arrendar', compact(['vehiculo','clientes']));
    }

    public function devolucion(Vehiculo $vehiculo)
    {
        return view('arriendos.devolucion', compact('vehiculo'));
    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {
        //
    }
}
