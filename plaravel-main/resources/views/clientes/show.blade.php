@extends('templates.master')

@section('contenido-principal')
<div class="row ny-2">
    <h4>Arriendos del cliente: <strong>{{$cliente->nombre}}</strong></h4>
</div>
<div class="row">
    @if ($cliente->arriendos->isEmpty())
    <div class="col">
        <div class="alert alert-info">
            Este cliente no ha arrendado vehiculos
        </div>
    </div>
    @endif
</div>
<div class="container-fluid">
    <div class="col-12 text-center my-2">
        <h3 class="fw-bold ">Arriendos Vigentes</h3>
    </div>
    @foreach ($cliente->arriendos as $arriendo)
    @if ($arriendo->fecha_devolucion == null)
    <div class="col-sm-6 col-lg-3 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vehiculo: {{$arriendo->patente_vehiculo}}</h5>
              <ul class="list-group list-group-flash">
                <li class="list-group-item">
                    <strong>Fecha de inicio: </strong> {{$arriendo->fecha_inicio}}
                    <img src="{{ Storage::url($arriendo->imagen_entrega)}}" class="card-img-top" alt="">
                </li>
                <li class="list-group-item">
                    <strong>Fecha de termino: </strong> {{$arriendo->fecha_termino}}
                </li>
                <li class="list-group-item">
                    <strong>Fecha de devolucion: <span class="text-danger">Pendiente!</span></strong>
                </li>
              </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<div class="container-fluid my-4">
    <div class="col-12 text-center my-2">
        <h3 class="fw-bold ">Arriendos Finalizados</h3>
    </div>
    @foreach ($cliente->arriendos as $arriendo)
    @if ($arriendo->fecha_devolucion <> null)
    <div class="col-sm-6 col-lg-3 mt-2 my-2">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vehiculo: {{$arriendo->patente_vehiculo}}</h5>
              <ul class="list-group list-group-flash">
                <li class="list-group-item">
                    <strong>Fecha de inicio: </strong> {{$arriendo->fecha_inicio}}
                    <img src="{{ Storage::url($arriendo->imagen_entrega)}}" class="card-img-top" alt="">
                </li>
                <li class="list-group-item">
                    <strong>Fecha de termino: </strong> {{$arriendo->fecha_termino}}
                </li>
                <li class="list-group-item">
                    <strong>Fecha de devolucion: </strong> {{$arriendo->fecha_devolucion}}
                </li>
              </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="row my-4">
    <div class="d-grid gap-2 d-lg-flex justify-content-md-end">
        <a href="{{route('clientes.index')}}" class="btn btn-info text-white">Volver a Clientes</a>
    </div>
</div>
@endsection


