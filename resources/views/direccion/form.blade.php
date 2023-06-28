@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear dirección</div>
                <div class="card-body">
                    <form action="{{ url('direcciones') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="direccionHelp">
                            <small id="direccionHelp" class="form-text text-muted">Nombre completo de la dirección</small>
                        </div>
                        <div class="form-group">
                            <label for="abreviatura">Abreviatura</label>
                            <input type="text" class="form-control" name="abreviatura" id="abreviatura" aria-describedby="abreviaturaHelp">
                            <small id="abreviaturaHelp" class="form-text text-muted">Abreviatura de la dirección</small>
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estatus" id="estatus" value="Activo">
                                <label class="form-check-label" for="estatus">Activo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estatus" id="estatus2" value="Inactivo">
                                <label class="form-check-label" for="estatus2">Inactivo</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
