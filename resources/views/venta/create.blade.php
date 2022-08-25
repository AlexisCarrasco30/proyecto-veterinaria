@extends('layouts.plantillaBase2')

<!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
.marco{
background-color: rgb(255, 255, 255);
border: 1px solid #000;
border-radius: 10px;
padding: 20px;
margin: 50px;
height:auto;
box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
}
body{
	min-height: 150vh;
	background-image: linear-gradient(120deg, #ff8181, #faf8f8);
    
}

</style>



@section('contenido')
<body>
    <div class="marco">
    <div class="container-fluid d-flex justify-content-center  text-light">
        <h2 class="text-center p-2 m-2 fs-1 fw-bold text-dark" >Seleccione artículos a vender</h2>
    
    </div>
  
    <div class="container-fluid d-flex justify-content-center  text-light">
        <select  id='idArticulos' class="js-example-basic-single" name="idArticulos" style="width:70%">
                <option value="0"></option>
                @foreach($lotes as $unLote)
                    <option value="{{$unLote->id}}" class="seleccion">{{$unLote->articulo->descripcion}} {{$unLote->articulo->marca}} {{$unLote->unidad}} {{$unLote->vencimiento}}</option>
                    
                @endforeach
        </select>
    </div>
    <br>
    <br>




    
    
@if(session("articulos") != null)
<div class="container-fluid d-flex justify-content-center  text-light">
        <div>
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-primary" href="/terminarVenta" title="realizar venta">Vender</a>
                </div>

                <div class="col-6">
                    <a class="btn btn-danger" href="/cancelarVenta" title="cancelar venta">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
    </div>
 <div class="caja_tabla-2"> 
    <div class="container-fluid d-flex justify-content-center  text-light">
   

</div>
</div>
@php
    $indice = 0;
    $total = 0;
@endphp

<div class= "container">
<table id="example"  class="table table-striped" style="width:100%" >
    <thead>
           
            <tr>
                <th scope="col">Id lote</th>
                <th scope="col">Artículo</th>
                <th scope="col">Marca</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>      
    <tbody>
    @foreach(session("articulos") as $producto)
        @php
            $date = date('d-m-Y',strtotime($producto->vencimiento));
        @endphp
    <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->articulo->descripcion}}</td>
        <td>{{$producto->articulo->marca}}</td>
        <td>{{$producto->unidad}}</td>
        <td>{{$producto->articulo->precioVenta}}</td>
        <td>{{($producto->unidad)*($producto->articulo->precioVenta)}}</td>
        <td>{{$date}}</td>
        <td><form action="{{route('quitarArticulo')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{$indice}}" name="articulo">
            <a class="btn " href="/agregarArticuloVenta/{{$producto->id}}" name="masUno" title="más Uno"><i class="fa-solid fa-circle-plus"></i></a>
            <a class="btn " href="/eleminarUnArticuloVenta/{{$producto->id}}" name="menosUno" title="menos Uno"><i class="fa-solid fa-circle-minus"></i></a>  
            <button class="btn" title="Eliminar"><i class="fa-solid fa-trash-can "></i></button>

        </form></td>

    </tr>
        @php
            $indice++;
            $total += ($producto->unidad)*($producto->articulo->precioVenta);
        @endphp
    @endforeach
    <tr><h2>Total: ${{$total}}</h2></tr>
    </tbody>
    </table>
    
    </div>
@else
    <div class="container-fluid d-flex justify-content-center  text-light">
        <div>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary" href="/terminarVenta" title="realizar venta" disabled>Vender</button>
                </div>

                <div class="col-6">
                    <a class="btn btn-danger" href="/cancelarVenta" title="cancelar venta">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
@endif

    <!-- ************************************************************ -->
    @if(Session::has('message'))

        <div class="alert
        {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('message') }}</div>

    @endif
</html>
    

   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="  https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>


        $(document).ready(function () {



           $('.js-example-basic-single').select2();
      

        });

        $("#idArticulos").on("change",function(event){
            var id = document.getElementById("idArticulos").value;
            if(id != 0){
                var link = "/agregarArticuloVenta/"+id;

                location.href = link;
            }
            
            

        });
        
        

        



        

    
        </script>
</body>
@endsection