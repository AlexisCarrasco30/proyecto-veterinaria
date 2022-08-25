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
        <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Crear turno</h2>
        <div class="row container-fluid d-flex justify-content-center">
            <div class="col-md-4 ">
    <form action="/turnos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label><br>
             <input type="date" name="fecha" placeholder="20:30" title="hora" required>
         
         </div>
        <div class="mb-3">
            <label for="" class="form-label">Desde</label>
            <input id="desde" name="desde" type="time" class="form-control" tabindex="2" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Hasta</label>
            <input id="hasta" name="hasta" type="time" class="form-control" tabindex="2" required>
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Duracion</label>
            <select id='duracion' name ="duracion" required>
                <option value="15">15 minutos</option>
                <option value="20">20 minutos</option>
                <option value="30">30 minutos</option>
                <option value="60">60 minutos</option>
                <option value="90">90 minutos</option>
                <option value="120">120 minutos</option>
            </select>
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Intervalo de descanso</label>
            <select id='descanso' name="descanso" required>
                <option value="10">10 minutos</option>
                <option value="15">15 minutos</option>
                <option value="20">20 minutos</option>
                <option value="30">30 minutos</option>
            </select>
        </div>


        <a href="/turnos" class="btn btn-secondary" tabindex="4">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    </form>
@endsection