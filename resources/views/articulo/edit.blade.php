@extends('layouts.plantillaBase2') 

@section('contenido')


<h2>Editar Articulo</h2>

<body>
    <form action="/articulos/{{$articulos->id}}" method="POST">
        @csrf
		@method('Put')
        <div class="mb-3">
            <label for="" class="form-label">Codigo Articulo</label>
            <input id="codigo" name="codigo" type="text" class="form-control" value ="{{$articulos->codigo}}" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" value ="{{$articulos->descripcion}}" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value ="{{$articulos->marca}}" tabindex="2">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Precio Especial</label>
            <input id="precioEspecial" name="precioEspecial" type="text" class="form-control" value ="{{$articulos->precioEspecial}}" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio Venta</label>
            <input id="precioVenta" name="precioVenta" type="text" class="form-control" value ="{{$articulos->precioVenta}}" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Iva</label>
            <input id="iva" name="iva" type="text" class="form-control" value ="{{$articulos->iva}}" tabindex="5" 	>
        </div>
       
        <div class="mb-3">
            <label for="" class="form-label">Minimo Stock</label>
            <input id="minimoStock" name="minimoStock" type="text" class="form-control" value ="{{$articulos->minimoStock}}" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Alerta</label>
            <input id="alerta" name="alerta" type="text" class="form-control" value ="{{$articulos->alerta}}" tabindex="5">
        </div>
        
        <div class="form-label">Categoria </div>
          <select  id='categoria' class="js-example-basic-single" name="categoria" style="width:70%">
          @foreach($categorias as $unaCategoria)
		  	@if($unaCategoria->id == $articulos->categoria->id)
			<option value="{{$unaCategoria->id}}" class="seleccion" selected >{{$unaCategoria->descripcion}}</option>
			@else
             <option value="{{$unaCategoria->id}}" class="seleccion">{{$unaCategoria->descripcion}}</option>
			@endif
          @endforeach
        </select>
        </select>
        </div>
          <br></br>
        




        <a href="/articulos" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
</div>

<script >
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});



</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

@endsection        
