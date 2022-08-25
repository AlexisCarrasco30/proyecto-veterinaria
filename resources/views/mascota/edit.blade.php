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
<div class="form-group  text-center">
    <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Editar mascota</h2>
<div class="row container-fluid d-flex justify-content-center">
<div class="col-md-6">
    <form action="/mascotas/{{$mascota->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$mascota->nombre}}" tabindex="1">
        </div>

        <div class="mb-3">
          
            <label for="" class="form-label">Raza</label>
            <input id="raza" name="raza" type="text" class="form-control" value="{{$mascota->raza}}" tabindex="2">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Especie</label>
          {{--   <select class="form-select" aria-label="Default select example">
              
                <option value="{{$mascota->especie}}">Perro</option>
                <option value="{{$mascota->especie}}">Gato</option>
                <option value="{{$mascota->especie}}">Pajaro</option>
                <option value="{{$mascota->especie}}">Tortuga</option>
                <option value="{{$mascota->especie}}">Conejo</option>
                <option value="{{$mascota->especie}}">Otro</option>
              </select> --}}
      
            <input id="especie" name="especie" type="text" class="form-control" value="{{$mascota->especie}}" tabindex="3">
        </div> 

        <?php if($mascota->sexo == "macho")
                { ?>
                    <div class="container-fluid d-flex justify-content-center ">
                    <div class="form-check m-4">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="macho" checked>
                        <label class="form-check-label " for="sexo1">
                            Macho
                        </label>
                    </div>
                    <br>
                    <div class="form-check m-4">
                        <input class="form-check-input " type="radio" name="sexo" id="sexo2" value="hembra">
                        <label class="form-check-label " for="sexo2">Hembra
                        </label>
                    </div>
        <?php   }
                else{?>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="macho">
                        <label class="form-check-label" for="sexo1">Macho</label>
                    </div>

                    <div class="form-check p-3">
                        <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="hembra" checked>
                        <label class="form-check-label " for="sexo2">Hembra</label>
             
        </div>
        <br>
        <?php       } ?>
    </div>

        <div class="mb-3">
            <label for="" class="form-label">Años</label>
            <input id="anioNacimiento" name="anioNacimiento" type="number" class="form-control" value="{{$mascota->anioNacimiento}}" tabindex="4">
        </div>

        <div class="mb-3">
            <label for="" class="form-label"></label>
            <input id="id" name="id" type="hidden" class="form-control" tabindex="5" value="{{$mascota->persona->id}}">
        </div>

        <input name="urlAnterior" type="hidden" value="{{url()->previous()}}">

        <a href="{{url()->previous()}}" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
@endsection