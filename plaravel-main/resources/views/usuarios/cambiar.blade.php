@extends('templates.master')

@section('title', 'Cambiar contraseña')

@section('contenido-principal')



<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

    <div class="container py-2 bg-white rounded">
        <h3 class="text-center">Cambiar contraseña</h3>
        <form method="POST" action="{{ route('usuarios.cambiarpass')}}">
            @csrf

            <div class="my-2">
                <label for="passog" class="form-label">Ingrese la contraseña: actual</label>
                <input type="password" id="passog" name="passog" placeholder="#######" class="form-control @error('passog') is-invalid @enderror">
                @error('passog')
                    <div id="passogFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="my-2">
                <label for="pass1" class="form-label">Ingrese la nueva contraseña: </label>
                <input type="password" id="pass1" name="pass1" placeholder="#######" class="form-control @error('pass1') is-invalid @enderror">
                @error('pass1')
                    <div id="pass1Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="my-2">
                <label for="pass2" class="form-label">Repita su nueva contraseña: </label>
                <input type="password" id="pass2" name="pass2" placeholder="#######" class="form-control @error('pass2') is-invalid @enderror">
                @error('pass2')
                        <div id="pass2Feedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Confirmar Cambio</button>
        </form>
    </div>

</div>


@endsection