@extends('templates.master')

@section('title', 'Arriendos')




@section('contenido-principal')

<div class="container-fluid d-flex justify-content-center align-items-center my-3">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="fw-bold ">Vehiculos Disponibles</h1>
        </div>
        @foreach($vehiculos as $index => $vehiculo)
        @if($vehiculo->estado == 'Disponible')
        <div class="col-12 col-md-6 col-lg-4 my-2">
            <div class="card rounded">
                <img src="{{asset('images/autoexample.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">Precio: ${{$vehiculo->tipo->precio}}/dia.</h2>
                    <p class="card-text"><span class="fw-bold">Patente del auto:</span> {{$vehiculo->patente}}.<br><span
                            class="fw-bold">Marca del auto:</span>
                        {{$vehiculo->marca}}.<br><span class="fw-bold">Tipo de auto:</span>
                        {{$vehiculo->tipo->nom_tipo}}
                        <br><span class="fw-bold">Año del auto:</span> {{$vehiculo->anio}}
                    </p>
                    <a href="{{route('arriendos.arrendar',$vehiculo)}}" class="btn btn-success">Arrendar Vehiculo</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div class="container-fluid d-flex justify-content-center align-items-center bg-white rounded my-3">
    <div class="row">
        <div class="col-12 text-center my-2">
            <h1 class="fw-bold ">Vehiculos Arrendados</h1>
        </div>
        @foreach($vehiculos as $index => $vehiculo)
        @if($vehiculo->estado == 'Arrendado')
        <div class="col-12 col-md-6 col-lg-4 my-2">
            <div class="card rounded">
                <img src="{{asset('images/autoexample.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h2 class="card-title">Precio: ${{$vehiculo->tipo->precio}}/dia.</h2>
                    <p class="card-text"><span class="fw-bold">Patente del auto:</span> {{$vehiculo->patente}}.<br><span
                            class="fw-bold">Marca del auto:</span>
                        {{$vehiculo->marca}}.<br><span class="fw-bold">Tipo de auto:</span>
                        {{$vehiculo->tipo->nom_tipo}}
                        <br><span class="fw-bold">Año del auto:</span> {{$vehiculo->anio}}

                    </p>
                    <a href="{{route('arriendos.devolucion', $vehiculo)}}" class="btn btn-primary col-6 mx-1"
                        style="width: 100%">Tramitar Recepcion</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div class="container-fluid bg-white rounded my-2 py-2">
    <table class="table">
        <h4 class="">Listado todos los arriendos </h4>
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Patente del vehiculo</th>
                <th scope="col">Rut del cliente</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Fecha de devolucion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arriendos as $arriendo)
            <tr>
                <td>{{$arriendo->id}}</td>
                <td>{{$arriendo->patente_vehiculo}}</td>
                <td>{{$arriendo->rut_cliente}}</td>
                <td>{{$arriendo->fecha_inicio}}</td>
                @if($arriendo->fecha_devolucion == Null)
                <td>Pendiente</td>
                @else
                <td>{{$arriendo->fecha_devolucion}}</td>
                @endif
                <td>
                    <a href="{{route('arriendos.show',$arriendo)}}" class="btn btn-sm btn-success"> 
                        <i class="fa-solid fa-eye"></i>
                    </a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection