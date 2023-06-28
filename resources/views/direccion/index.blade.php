@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Direcciones</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ url('direcciones/create') }}">agregar dirección</a>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Abreviatura</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($direcciones as $direccion)
                            <tr>
                                <td>{{ $direccion->id }}</td>
                                <td>{{ $direccion->direccion }}</td>
                                <td>{{ $direccion->abreviatura }}</td>
                                <td>{{ $direccion->estatus }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
