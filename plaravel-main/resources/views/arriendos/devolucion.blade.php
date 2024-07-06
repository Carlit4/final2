@extends('templates.master')

@section('title', 'Arriendos')


@section('contenido-principal')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid bg-white rounded">

        <div class="text-center">
            <h1>Devolucion: {{$vehiculo->marca}}, {{$vehiculo->patente}} ({{$vehiculo->tipo->nom_tipo}} ) </h1>
        </div>

        <form method="POST" action="{{route('arriendos.devolustore')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <input type="hidden" id="patente_vehiculo" name="patente_vehiculo" value="{{$vehiculo->patente}}" class="form-control">
                <input type="hidden" id="rut_cliente" name="rut_cliente" value="{{$vehiculo->rut_cliente}}" class="form-control">


                <div class="col-12 my-2">
                    <label for="fecha_devolucion" class="form-label">Fecha de devolucion: </label>
                    <input type="date" class="form-control @error('fecha_devolucion') is-invalid @enderror" id="fecha_devolucion" name="fecha_devolucion">
                    @error('fecha_devolucion')
                        <div id="fecha_devolucionFeedback" class="invalid-feedback" >
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="hora_devolucion" class="form-label">Hora de devolucion: </label>
                    <input type="time" class="form-control @error('hora_devolucion') is-invalid @enderror" id="hora_devolucion" name="hora_devolucion">
                    @error('hora_devolucion')
                        <div id="hora_devolucionFeedback" class="invalid-feedback" >
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="img_rec" class="form-label">Imagen de Recepcion:</label>
                    <input type="file" class="form-control-file @error('img_rec') is-invalid @enderror" id="img_rec" name="img_rec">
                    @error('img_rec')
                        <div id="img_recFeedback" class="invalid-feedback" >
                            {{$message}}
                        </div>
                    @enderror
                </div>

                {{-- @if($errors->any())
                <div class="alert alert-warning py-1">
                    {{ $errors->all()[0] }}
                </div>
                @endif --}}

            </div>

            <div class="my-3 me-2 d-flex justify-content-end">
                <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer Campos</button>
                <button class="btn btn-success" type="submit">Registrar Recepcion</button>
            </div>

        </form>

    </div>
</div>
@endsection
