@extends('templates.master')


@section('scripts')

$(document).ready(function() {
    $('#btnLimpiar').click(function() {
        $('form')[0].reset(); // Esto vacía todos los campos del primer formulario encontrado en la página
    });
});

@endsection

@section('contenido-principal')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar tipo de vehiculo</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tipos.update', $tipo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div>
                        <label class="form-label" for="nom_tipo">Tipo: </label>
                        <input type="text" name="nom_tipo" id="nom_tipo" class="form-control @error('nom_tipo') is-invalid @enderror" value="{{$tipo->nombre}}">
                        @error('nom_tipo')
                            <div id="nom_tipoFeedback" class="invalid-feedback">
                               {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" for="precio">Precio: </label>
                        <input type="text" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{$tipo->precio}}">
                        @error('precio')
                            <div id="precioFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="m-3 d-flex justify-content-end">
                        <button type="button" id="btnLimpiar" class="btn btn-warning me-1 btn-sm">Restablecer campos</button>

                        <button type="submit" class="btn btn-success ms-2 btn-sm">Aplicar Cambios</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
