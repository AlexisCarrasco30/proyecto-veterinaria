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
<div class="form-group   text-center">
    <h2 class="text-center text-light p-2 m-2 fs-1 fw-bold" >Nuevo Articulo</h2>
  
   <div class="row container-fluid d-flex justify-content-center">
    <div class="col-md-6">
   <div class="row">
      <form action="/articulos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Codigo Articulo</label>
            <input id="codigo " name="codigo" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" tabindex="2">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Precio Especial</label>
            <input id="precioEspecial" name="precioEspecial" type="text" class="form-control" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio Venta</label>
            <input id="precioVenta" name="precioVenta" type="text" class="form-control" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Iva</label>
            <input id="iva" name="iva" type="text" class="form-control"  tabindex="5" >
        </div>
       
        <div class="mb-3">
            <label for="" class="form-label">Minimo Stock</label>
            <input id="minimoStock" name="minimoStock" type="text" class="form-control" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Alerta de Vencimiento</label>
            <input id="alerta" name="alerta" type="text" class="form-control" tabindex="5">
        </div>
        
        <div class="mb-3">
          <label for="" class="form-label">Categoria</label>
          <select  id='categoria' class="js-example-basic-single form-control " name="categoria">
              
          @foreach($categorias as $unaCategoria)
             <option value="{{$unaCategoria->id}}" class="seleccion">{{$unaCategoria->descripcion}}</option>
          @endforeach
        </select>
      
        </div>
          <br>
          <div class="container-fluid d-flex justify-content-center m-2">
        <a href="/articulos" class="btn btn-secondary m-2 " tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary  m-2 " tabindex="7">Guardar</button>
          </div>
      </form>
  </div>
<div class="col-2"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

@endsection