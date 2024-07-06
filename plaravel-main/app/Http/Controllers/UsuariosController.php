<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ContraRequest;
use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UsuariosController extends Controller
{
    public function index()
    {

        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }


        $usuarios = Usuario::all();
        $perfiles = Perfil::all();

        return view('usuarios.index', compact(['usuarios', 'perfiles']));
    }


    public function create()
    {
        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }
        $perfiles = Perfil::all();
        return view('usuarios.create', compact('perfiles'));
    }


    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();

        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil;
        $usuario->save();
        return redirect()->route('usuarios.index');

    }


    public function show()
    {
        //
    }


    public function edit(Usuario $usuario)
    {

        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }

        $perfiles = Perfil::all();
        return view('usuarios.edit', compact(['usuario', 'perfiles']));
    }


    public function update(Request $request, Usuario $usuario)
    {
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }


    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }


    public function login(){
        return view('usuarios.login');
    }

    public function logout(){

        Auth::logout();
        return view('usuarios.login');
    }

    
    public function autenticar(Request $request){
        $credenciales = $request->only(['email','password']);

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->withErrors('Las credenciales ingresadas son incorrectas!!')->onlyInput('email');
    }

    public function cambiar(){
        return view('usuarios.cambiar');
    }

    public function cambiarpass(ContraRequest $request){
        $usuario = auth()->user();

        // dd($credenciales);
        if(Hash::check($request->passog,$usuario->password)){
            
            if($request->pass1 == $request->pass2){
                // dd('contraseñas iguales');
                $usuario->password = Hash::make($request->pass1);
                $usuario->save();
                auth()->logout();
                return redirect()->route('usuarios.login');

            } else{
                // dd('contraseñas distintas');
                return back()->withErrors(['error_message' => "Contraseñas nuevas distintas"]);
            }   

        } else{
            // dd('contraseña actual erronea');
            return back()->withErrors(['error_message' => "Contraseñas actual erronea"]);

        }
    }



}
