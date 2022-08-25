@extends('layouts.plantillaBase2')
 

@section('contenido')

    <h2>Nuevo Lote</h2>


    <form action="/Lotes/{{$ArticuloId}}/store" method="POST">
        @csrf
        @method('Post')
        <div class="mb-3">
            <label for="" class="form-label">unidades</label>
            <input id="unidades" name="unidades" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio Compra</label>
            <input id="precioCompra" name="precioCompra" type="text" class="form-control" tabindex="2">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Vencimiento</label>
            <input id="vencimiento" name="vencimiento" type="date" class="form-control" tabindex="5">
        </div>

        <a href="Lotes/{{$ArticuloId}}/lote" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

@endsection