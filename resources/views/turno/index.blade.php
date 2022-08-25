@extends('layouts.plantillaBase')

<!--Jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--Floating WhatsApp css-->
<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

<style>
body{
	min-height: 150vh;
	background-image: linear-gradient(120deg, #ffffff, #8e44ad);
}
table{

    background-color:#ffffff!important;   
    box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.1) !important;
}
    table th{
        background-color: rgba(100, 83, 153, 1) !important;
        color:#ffffff;
        padding: 10px;
        margin: 10px;
        text-align: center !important;
    }
    table td{
        background-color: rgba(255, 239, 239, 0.1) !important;
        color:#000000;
        padding: 20px !important;
        text-align: center !important;
        
    }
    .caja_tabla-2{
    
        margin: 15px;
    }
    .boton_crear{
        background-color: rgba(100, 83, 153, 1) !important;
        color:#ffffff;
     
    }
    a:link, a:visited, a:active {
    text-decoration:none;
    }
    </style>

@section('contenido')


<h2 class="text-center p-2 m-2 fs-1 fw-bold text-dark" >Listado de turnos</h2>
   

    <a href="turnos/create"  class="btn btn-primary rounded-pill" title="Agregar Turno">+ Turno <i class="fa-solid fa-calendar-days"></i></a>
    <br>
    <br>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
            {{--     <th scope="col">Tipo</th> --}}
             
              {{--   <th scope="col">Estado</th> --}}
                <th scope="col">Persona</th>
                <th scope="col">DNI</th>
                <th scope="col">Celular</th>
                <th scope="col">Acciones</th>
                <th scope="col">WhatsApp</th>
            </tr>
        </thead>

        <tbody>
            @foreach($turnos as $unTurno)
                <tr>
                    @foreach(explode(' ', $unTurno->start) as $info) 
                    <td>{{$info}} </td>
                     @endforeach
                     
                    @if($unTurno->personaId)
                        <td>{{$unTurno->nombre}} {{$unTurno->apellido}}</td>
                        <td>{{$unTurno->dni}}</td>
                      
                    @else 
                    <td></td>
                    <td></td>
                    <td></td>
                       
                    @endif
                   
                 
                    @foreach($tel as $unTel)
                   
                    @if($unTel->persona_id == $unTurno->personaId)
                    <td>{{$unTel->numero}}</td>
                     @else 
                    
                    @endif
                    @endforeach
                    
                    <td>
         {{--                    <a href="{{ route('turnos.show',$unTurno->id)}}" class="btn "> <i class="fa-solid fa-eye"></i></a> --}}
                          {{--   @if($unTurno->personaId)
                                <a href="{{ route('cancelarTurno',$unTurno->id)}}" class="btn ">Cancelar</a>
                            @endif
 --}}
                            <a href="turnos/{{$unTurno->id}}/edit" class="btn "><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn cancelar" title="" id="{{$unTurno->id}}" value='{{$unTurno->id}}'><i class="fa-solid fa-ban"></i></button>
                            
                        
                            <button class="btn btn eliminar" title="" id="{{$unTurno->id}}" value='{{$unTurno->id}}'><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <td>
                       <a class="bnt btn-success rounded-pill m-1 p-3" title="Enviar WhatsApp" href="turnos/mensaje/{{$unTurno->id}}" name="Boton_Enviar">Enviar <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </td>
                   
                </tr>
            
               
            @endforeach
           
        </tbody>
    </table>
     
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
                        
                         location.href = '/turnos/'+cod+'/delete'; 

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