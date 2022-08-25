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

<div class="form-group ">
    <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Editar Cliente</h2>
    <div class="row container-fluid d-flex justify-content-end">
        <div class="col-md-4 ">
            <a href="{{route('creartelefono', $persona->id)}}" class="btn btn-primary ml-2 rounded-pill" title="Agregar Teléfono">+ Teléfono <i class="fa-solid fa-phone"></i></a>
          
        
           
    <a href="/telefonos/{{$persona->telefonos->id}}/edit" class="btn btn-secondary ml-2 rounded-pill">Editar <i class="fa-solid fa-phone"></i></a></div>


      
    </div>
   
<div class="container-fluid d-flex justify-content-center">
<div class="col-md-6">
 
    <form action="/personas/{{$persona->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$persona->nombre}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2" value="{{$persona->apellido}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Dni</label>
            <input id="dni" name="dni" type="number" class="form-control" tabindex="3" value="{{$persona->dni}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" type="text" class="form-control" tabindex="4" value="{{$persona->direccion}}">
        </div>

         <div class="mb-3">
            <label for="" class="form-label">celular</label>
            
                <input id="telefono" name="celular " type="number" class="form-control bg-secondary" tabindex="5" value="{{$persona->telefonos->codigoArea .$persona->telefonos->numero}}" disabled>
    
        </div> 
       
        
           
           

        <!-- <hr>
        <h5>Mascotas</h5>
        <div class="row">
            <div class="col-4">
                <a href="{{route('crearMascota', $persona->id)}}" class="btn btn-primary">Agregar Mascota</a>
            </div>
        </div>

        @foreach($persona->mascotas as $unaMascota)
        <div class="row">
            <div class="col-4"></div> 
            <div class="col-4">{{$unaMascota->nombre}} <a href="/mascotas/{{$unaMascota->id}}/edit" class="btn btn-info ml-2">Editar mascota</a></div>
        </div>
        @endforeach -->
        <br>
        <a href="/personas" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
@endsection