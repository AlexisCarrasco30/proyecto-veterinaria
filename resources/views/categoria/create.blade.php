@extends('layouts.plantillaBase2')
<style>
    .form-group{
        background-color: rgba(255, 52, 11) !important;
        margin: 0px;
        width:auto;
        height: auto;
        
    }
    .form-label{
       color:#ffffff;
    }
    </style>


@section('contenido')
<div class="form-group text-center">
    <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Nueva categoría</h2>
   
    <div class="row container-fluid d-flex justify-content-center">
        <div class="col-md-6">
       <div class="row">

    <form action="/categorias" method="POST">
        @csrf
       
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3">
        </div>
        <a href="/categorias" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
</div>
        
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

@endsection  