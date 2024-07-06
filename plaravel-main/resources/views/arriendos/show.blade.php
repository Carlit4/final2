@extends('templates.master')

@section('contenido-principal')
<h3>Listado de arriendos :</h3>

<div class="container-fluid py-2 my-2 bg-white">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3 my-2">
            <div class="card shadow" style="">
                <img src="{{Storage::url($arriendo->imagen_entrega)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-header text-center border border-0"><strong>Foto de Entrega</strong></p>
                </div>
            </div>
        </div>

        @if($arriendo->imagen_recepcion == Null)
        <div class="col-12 col-md-6 col-lg-3 my-2">
            <div class="card shadow" style="">
                <img src="{{asset('images/pendiente.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-header border border-0 text-danger text-center"><strong>Devolucion Pendiente</strong></p>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-3 col-6 my-2">
            <div class="card shadow" style="">
                <img src="{{Storage::url($arriendo->imagen_recepcion)}}" class="card-img-top" alt="...">
                <div class="card-body border border-0">
                    <p class="card-header border border-0 text-center"><strong>Foto de Devolucion</strong></p>
                </div>
            </div>
        </div>
        @endif
        

        <div class="col-12 col-lg-6 my-2">
            <div class="card shadow">
                <div class="card-header text-center">
                  <h5><strong>Informacion del arriendo</strong></h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Rut del cliente:</strong> {{$arriendo->rut_cliente}}</li>
                  <li class="list-group-item"><strong>Patente del vehiculo: </strong> {{$arriendo->patente_vehiculo}}</li>
                  <li class="list-group-item"><strong>Fecha del inicio: </strong> {{$arriendo->fecha_inicio}} {{$arriendo->hora_inicio}}</li>
                  <li class="list-group-item"><strong>Fecha del termino: </strong> {{$arriendo->fecha_termino}} {{$arriendo->hora_termino}}</li>
                  <li class="list-group-item"><strong>Precio: </strong>${{$arriendo->vehiculo->tipo->precio}}/dia</li>
                  
                  @if($arriendo->fecha_devolucion == Null)
                  <li class="list-group-item"><strong>Fecha de devolucion: <span class="text-danger">Pendiente!</span></strong> </li>
                  <li class="list-group-item"><strong>Valor total del arriendo: <span class="text-danger">Pendiente!</span></strong></li>
                  <li class="list-group-item"><strong>Duracion del arriendo: <span class="text-danger">Pendiente!</span></strong></li>
                  @else
                  <li class="list-group-item"><strong>Fecha de devolucion: </strong> {{$arriendo->fecha_devolucion}} {{$arriendo->hora_devolucion}}</li>
                  <li class="list-group-item"><strong>Duracion del arriendo: {{$dias}} dias </strong></li>
                  <li class="list-group-item"><strong>Valor del total: ${{$total}}</strong></li>
                  @endif
                  
                </ul>
              </div>
        </div>


    </div>

</div>


@endsection