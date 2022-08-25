@extends('layouts.plantillaBase')
<style>
    .form-group{
        background-color: rgba(100, 83, 153, 1) !important;
        margin: 0px;
        width:auto;
        height: auto;
        text-align: center;
        color:#ffffff;
        
    }
    .form-label{
       color:#ffffff;
    }
</style>
@section('contenido')
  
    <div class="form-group text-center">
        <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Editar turno</h2>
        <div class="row container-fluid d-flex justify-content-center">
            <div class="col-md-4 ">
    <form action="/turnos/{{$turno->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label><br>
             <input type="date" name="fecha" placeholder="20:30" title="fecha" value='{{$fecha}}'>
         
         </div>

        <div class="mb-3">
            <label for="" class="form-label">Hora</label>
            <input id="hora" name="hora" type="time" class="form-control" tabindex="2" value='{{$hora}}'>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tipo</label>
            <input id="tipo" name="tipo" type="text" class="form-control" tabindex="3" value="v">
        </div>

        <a href="/turnos" class="btn btn-secondary" tabindex="4">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    </form>
@endsection