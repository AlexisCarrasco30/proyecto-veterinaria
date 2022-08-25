@extends('layouts.plantillaBase')
<style>
.form-group{
    background-color: rgba(100, 83, 153, 1) !important;
    margin: 0px;
    width:auto;
    height: auto;
    
}
.form-label{
   color:#ffffff;
}
</style>
@section('contenido')



    <div class="form-group   text-center">
        <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Crear Cliente</h2>
    <div class="row container-fluid d-flex justify-content-center">
   <div class="col-md-6">
    <form action="/personas" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2"required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Dni</label>
            <input id="dni" name="dni" type="number" class="form-control" tabindex="3" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4"required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Área</label>
            <input id="codigoArea" name="codigoArea" type="number" class="form-control" tabindex="5" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Número</label>
            <input id="numero" name="numero" type="number" class="form-control" tabindex="5" required>
        </div>
        <div class="container-fluid d-flex justify-content-center m-2">
        <a href="/personas" class="btn btn-secondary m-2" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary m-2" tabindex="7">Guardar</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection