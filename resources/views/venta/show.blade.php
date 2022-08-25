@extends('layouts.plantillaBase2')

@section('contenido')
    
    
    <div class="row text-center">
        <div class="col-12"><h3>Fecha de la venta: {{$venta->fecha}}</h3></div>
    </div>
    <table class="table table-dark table-striped mt-4">
        <thead>
           
           <tr>
               <th scope="col">codigo de artículo</th>
               <th scope="col">Nombre</th>
               <th scope="col">Marca</th>
               <th scope="col">Precio de venta</th>
               <th scope="col">Fecha de vencimiento Lote</th>
               <th scope="col">Cantidad</th>
               <th scope="col">Subtotal</th>
           </tr>
        </thead>
        <tbody>
        
            @foreach($detalles as $unDetalle)
            <tr>
                <td>{{$unDetalle->codigo}}</td>

                <td>{{$unDetalle->descripcion}}</td>

                <td>{{$unDetalle->marca}}</td>

                <td>{{$unDetalle->precioVenta}}</td>

                <td>{{$unDetalle->vencimiento}}</td>

                <td>{{$unDetalle->cantidad}}</td>
            
                <td>{{$unDetalle->subtotal}}</td>
            </tr>
            @endforeach
       </tbody>

    </table>
    @php
     $montoAdeudado = $venta->total-$venta->montoPagado;
    @endphp
    <div class="container">
        <div class="text-end">
            <h3>Total: ${{$venta->total}}</h3>
            <h3>Monto cobrado: ${{$venta->montoPagado}}</h3>
            <h3>Monto adeudado: ${{$montoAdeudado}}</h3>
        </div>
    </div>

    <a href="/ventas" class="btn btn-primary">Volver</a>
@endsection