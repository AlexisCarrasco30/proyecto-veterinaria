@extends('layouts.plantillaBase2')
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>

body{
	min-height: 150vh;
	background-image: linear-gradient(120deg, #ff5454, #ed1919);
    
}


.marco{
background-color: rgb(255, 255, 255);
border: 1px solid #000;
border-radius: 10px;
padding: 20px;
margin: 50px;
height:auto;
box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
}
.container-fluid{
    padding: 10px;  
}
</style>

@section('contenido')
<body>
 <div class="marco">
    <div class="container-fluid d-flex justify-content-center  text-light ">
        <h3 class="text-center p-2 m-2 fs-1 fw-bold text-dark" >Seleccione método de pago</h3>
    
    </div>
<form action="/ventas/confirmarVenta/{{$venta->id}}" method="Post">
    @csrf
    @method('Post')
    <div class="container-fluid d-flex justify-content-center  text-light">
        <select  id='tipoPago' class="js-example-basic-single" name="tipoPago" style="width:70%">
                <option value="efectivo">Efectivo</option>
                <option value="debito">Debito</option>
        </select>
    </div>
    <br>
    <br>
  
    

<div class="container-fluid d-flex justify-content-center">
  
        <div class="row"> 
            <div class="col-md-4">
                <h4 class="text-black">Costo total: ${{$venta->total}}</h4>
            </div>

            <div class="col-md-5">
                <label class="pesos text-dark">$<label><input type="number" name="pago" value="0">
            </div>
            <div class="col-md-3">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-sack-dollar"></i> Confirmar</button>
            </div>
        </div>
</form>
</div>

   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="  https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>


        $(document).ready(function () {



           $('.js-example-basic-single').select2();
      

        });
    
    </script>
</body>
@endsection