@extends('templates.master')


@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        $('form')[0].reset(); // Esto vacía todos los campos del primer formulario encontrado en la página
    });
});

@endsection

@section('contenido-principal')
<div class="row">
    <div class="card mt-2 ">
        <div class="card-header pt-3">
            <h5 class="card-title">Agregar un nuevo vehiculo: </h5>
        </div >
        <div class="card-body ">
          <form method="POST" action="{{route('vehiculos.store')}}" >
            @csrf
            <div>
                <label class="form-label" for="patente">Patente: </label>
                <input type="text" name="patente" id="patente" class="form-control @error('patente') is-invalid @enderror">
                @error('patente')
                        <div id="patenteFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mt-2">
                <label class="form-label" for="marca">Marca: </label>
                <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror">
                @error('marca')
                        <div id="marcaFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mt-2">
                <label class="form-label" for="anio">Año: </label>
                <input type="text" name="anio" id="anio" class="form-control @error('anio') is-invalid @enderror">
                @error('anio')
                        <div id="anioFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mt-3">
                <label class="form-label" for="tipo">Seleccione tipo de vehiculo: </label>
                <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror">
                    {{-- <option value="">Seleccione</option> --}}
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nom_tipo}}</option>
                    @endforeach
                </select>
                @error('tipo')
                        <div id="tipoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                @enderror
            </div>

            <div class="mt-2">
                <label class="form-label" for="estado">Estado: </label>
                <input type="integer" name="estado" id="estado" class="form-control" value="Disponible" disabled>
            </div>

            <div class="mt-3 me-2 d-flex justify-content-end">
                <button type="button" id="btnLimpiar" class="btn btn-warning me-2">Restablecer campos</button>

                <button class="btn btn-success" type="submit">Agregar Vehiculo</button>
            </div>

          </form>
        </div>
      </div>
</div>
@endsection
