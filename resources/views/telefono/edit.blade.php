@extends('layouts.plantillaBase')

@section('contenido')
    <h2>Editar telefono</h2>

    <form action="/telefonos/{{$telefono->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <div class ='row'>
            <div class="mb-3 col 3">
                <label for="" class="form-label text-light">Código Área</label>
                <input id="codigo" name="codigo" placeholder="343... " type="text" class="form-control" tabindex="1" maxlength="14" value="{{$telefono->codigoArea}}" required>
            </div>

            <div class="mb-3 col-9 ">
                <label for="" class="form-label text-light ">Numero</label>
                <input id="numero" name="numero" placeholder="Ingrese celular 154...  " type="text" class="form-control" tabindex="1" maxlength="14" value="{{$telefono->numero}}"required>
            </div>
        </div>
            
            <input name="urlAnterior" type="hidden" value="{{url()->previous()}}">
        </div>

        <a href="{{url()->previous()}}" class="btn btn-secondary" tabindex="6">Cancelar</a>

        <button type="submit" class="btn btn-primary" tabindex="2">Guardar</button>
    </form>
@endsection