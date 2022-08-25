@extends('layouts.plantillaBase2')



@section('contenido')


    <h2>Editar categoría</h2>


    <form action="/categorias/{{$categoria->id}}" method="POST">
        @csrf
		@method('Put')
        
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" value ="{{$categoria->descripcion}}"class="form-control" tabindex="3">
        </div>
        <a href="/categorias" class="btn btn-secondary" tabindex="6">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </form>
</div>


    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

@endsection  