@extends('layouts.plantillaBase2')


@section('contenido')


<div class="caja_tabla-2">
    <div class="container-fluid d-flex justify-content-center">

    <h4>Articulos vencidos</h4>
    
    </div>

    </div>
    
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
           
            <tr>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col">Articulo</th>
                <th sacope="col">Marca</th>
                <th scope="col">Alerta</th>
                <th scope="col">Dias restantes</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        
            @foreach($resultados as $unLote)
               @if($unLote->dias <= 0) 
                    <tr class='vencido'>
               @endif
                    <td>{{$unLote->vencimiento}}</td>
                    <td>{{$unLote->descripcion}}</td>
                    <td>{{$unLote->marca}}</td>
                    <td>{{$unLote->alerta}}</td>
                    <td>{{$unLote->dias}}</td>
                    <td>
                    <a href="/Lotes/{{$unLote->id}}/Vencimientodelete" name="delete" class="btn btn-danger" title="delete"><i class="fa-solid fa-trash-can"></i></a> 
                            
                    </td>
                </tr>
            @endforeach

        </tbody>
    
    
    </table>
    </div>

  <script src="  https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>


        $(document).ready(function () {

           $('#example').DataTable();
      

         });
        $('#example').DataTable({
        language: {
        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
        }); 




        </script>
@endsection        

