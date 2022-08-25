@extends('layouts.plantillaBase2')

@section('contenido')

<div class="caja_tabla-2">
    <div class="container-fluid d-flex justify-content-center">
        
    <h4>Articulo: {{$articulos->descripcion}}</h4>
   
    
    </div>
    <div class="container-fluid d-flex justify-content-center">
   
    <h4>Marca: {{$articulos->marca}}</h4>
    
    </div>

    
    <a href="/Lotes/{{$articulos->id}}/create" type="button" class="btn btn-outline-primary  boton_crear">+ Crear lote</a>
    </div>

        <table id="example" class="table table-striped" style="width:100%">
        <thead>
           
            <tr>
                <th scope="col">Id</th>
                <th sacope="col">unidad</th>
                <th scope="col">Precio Costo</th>
                <th scope="col">vencimiento</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lotes as $unLote)

                @if($unLote->vencimiento < Carbon\Carbon::now()->format('Y-m-d'))
                    <tr class="vencido"> 
                @elseif($unLote->vencimiento < Carbon\Carbon::now()->addDay($unLote->articulo->alerta)->format('Y-m-d'))
                    <tr class="porvencer"> 
                @endif
                    <td>{{$unLote->id}}</td>
                    <td>{{$unLote->unidad}}</td>
                    <td>{{$unLote->precioCompra}}</td>
                    <td>{{$unLote->vencimiento}}</td>
                    <td>
                            <a href="/lotes/{{$unLote->id}}/edit " name="Editar" class="btn btn-success" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn eliminar" title="Eliminar" id="{{$unLote->id}}" value= '{{$unLote->id}}'><i class="fa-solid fa-trash-can"></i></button>
                           
                            
                    </td>
                </tr>
            @endforeach

        </tbody>
    
    
    </table>
    </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


        /*------------------------------------------------ */
$(document).ready(function (){
 var id = 0;
        var botones = document.getElementsByClassName("eliminar");

        var boton = [];
        
         let cantidad = botones.length;
              for(let i = 0; i < cantidad; i++){
                  //botones[i].addEventListener('click', () => {
                  id = botones[i].id;
                  //console.log(id);
                  boton[i]= document.getElementById(`${id}`);
                
                  boton[i].addEventListener('click', function(){
                    
                         var cod = boton[i].value;

                        Swal.fire({
                            title: 'Esta Seguro que desea Borrar?',
                            text: "confirme la decisión!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, eliminar'
  
                         }).then((result) => {
                     if (result.isConfirmed) {
                        
                         location.href = '/Lotes/'+cod+'/delete'; 

                         /*  Swal.fire(
                        'Eliminado',
                        'Your file has been deleted.',
                        'success'
                        ) */
                          }
                        })

                     });

                    }
});






        </script>
@endsection        

