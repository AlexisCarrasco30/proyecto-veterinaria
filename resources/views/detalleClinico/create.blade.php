@extends('layouts.plantillaBase')
<style>
.form-group{
    background-color: rgba(100, 83, 153, 1) !important;
    margin: 0px;
    width: auto !important;
    height:auto!important;
    align-content: center;
    color:#ffffff;
    
}
</style>
@section('contenido')
<h2 class="text-center p-2 m-2 fs-1 fw-bold" >Agregar Detalle Clínico</h2>
<div class="form-group  text-center">
    <div class="row container-fluid d-flex justify-content-center m-2 p-2">
        <div class="col-md-6">
    <form action="/detallesClinicos" method="POST">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Observaciones</label>
            <input id="observaciones" name="observaciones" type="text" class="form-control" tabindex="1">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tratamiento</label>
            <input id="tratamiento" name="tratamiento" type="text" class="form-control" tabindex="2">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Patología</label>
            <input id="patologia" name="patologia" type="text" class="form-control" tabindex="3">
        </div>


        <div class="mb-3">
            <label for="" class="form-label"></label>
            <input id="id" name="idHistorialClinico" type="hidden" class="form-control" tabindex="5" value="{{$historialClinico_id}}">
        </div>
        
        <input name="urlAnterior" type="hidden" value="{{url()->previous()}}">

        <a href="{{url()->previous()}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
</div>
</div>
@endsection