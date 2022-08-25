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

<div class="container-fluid d-flex justify-content-end">
    <a href="{{url()->previous()}}" class="btn btn-secondary rounded-pill m-3"><i class="fa-solid fa-arrow-rotate-left"></i></a>
<a href="{{route('crearDetalleClinico', $historialClinicoId)}}" class="btn btn-primary rounded-pill m-3" title="crear Detalle Clínico">+ detalle clínico</a>
</div>
@if(count($detallesClinicos) == 0)
    <br>
    <h4 class="text-center">No tiene detalles agregados</h4>
    
@else
    @foreach($detallesClinicos as $unDetalle )
    <table class="table table-dark table-striped mt-4">
        <tr>
            <td>Id: </td><td>{{$unDetalle->id}}</td>
        </tr>
        <tr>
            <td>Observaciones: </td><td>{{$unDetalle->observaciones}}</td>
        </tr>
        <tr>
            <td>Fecha de Atención: </td><td>{{$unDetalle->fechaAtencion}}</td>
        </tr>
        <tr>
            <td>Tratamiento: </td><td>{{$unDetalle->tratamiento}}</td>
        </tr>
        <tr>
            <td>Patología: </td><td>{{$unDetalle->patologia}}</td>
        </tr>
    
    </table>
    @endforeach

@endif

    

    

@endsection