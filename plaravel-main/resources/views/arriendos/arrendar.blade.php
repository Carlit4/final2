@extends('templates.master')

@section('title', 'Ingresar arriendo')


@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        $('form')[0].reset();
    });
});

@endsection

@section('contenido-principal')

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid bg-white rounded">

        <div class="text-center">
            <h1>Arrendar: {{$vehiculo->marca}}, {{$vehiculo->patente}} ({{$vehiculo->tipo->nom_tipo}}) </h1>
        </div>

        <form method="POST" action="{{route('arriendos.store')}} " enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-12 my-2">
                    <label for="rut_cliente">Cliente: </label>
                    <select name="rut_cliente" id="rut_cliente"
                        class="form-select @error('rut_cliente') is-invalid @enderror"
                        aria-label="Seleccione un cliente:">
                        @foreach($clientes as $index => $cliente)
                        <option value="{{$cliente->rut}}">{{$cliente->rut}}</option>
                        @endforeach
                    </select>
                    @error('rut_cliente')
                    <div id="rut_clienteFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <input type="hidden" id="patente_vehiculo" name="patente_vehiculo" value="{{$vehiculo->patente}}"
                    class="form-control">

                <div class="col-12 my-2">
                    <label for="fecha_ini" class="form-label">Fecha de entrga: </label>
                    <input type="date" class="form-control @error('fecha_ini') is-invalid @enderror" id="fecha_ini"
                        name="fecha_ini">
                    @error('fecha_ini')
                    <div id="fecha_iniFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="hora_inicio" class="form-label">Hora de entrega: </label>
                    <input type="time" class="form-control @error('hora_inicio') is-invalid @enderror" id="hora_inicio"
                        name="hora_inicio">
                    @error('hora_inicio')
                    <div id="hora_inicioFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="fecha_ter" class="form-label">Fecha de termino: </label>
                    <input type="date" class="form-control @error('fecha_ter') is-invalid @enderror" id="fecha_ter"
                        name="fecha_ter">
                    @error('fecha_ter')
                    <div id="fecha_terFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="hora_termino" class="form-label">Hora de termino: </label>
                    <input type="time" class="form-control @error('hora_termino') is-invalid @enderror"
                        id="hora_termino" name="hora_termino">
                    @error('hora_termino')
                    <div id="hora_terminoFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-12 my-2">
                    <label for="img_ent" class="form-label">Imagen de entrega:</label>
                    <input type="file" class="form-control-file @error('img_ent') is-invalid @enderror" id="img_ent"
                        name="img_ent">
                    @error('img_ent')
                    <div id="img_entFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                {{--
                @if($errors->any())
                <div class="alert alert-warning py-1">
                    {{ $errors->all()[0] }}
                </div>
                @endif --}}

                @if ($errors->has('error_message'))
                <div class="alert alert-danger">
                    {{ $errors->first('error_message') }}
                </div>
                @endif

            </div>

            <div class="my-3 me-2 d-flex justify-content-end">
                <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer Campos</button>
                <button class="btn btn-success" type="submit">Registrar Arriendo</button>
            </div>

        </form>

    </div>
</div>



@endsection