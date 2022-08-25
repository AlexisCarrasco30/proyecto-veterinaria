@extends('layouts.plantillaBase')
<style>
table th{
    background-color: rgba(100, 83, 153, 1) !important;
    color:#ffffff;
}
table td{
    background-color: rgba(66, 6, 244, 0.1) !important;
    color:#000000;
}

</style>

@section('contenido')
<div class="container-fluid d-flex justify-content-center .boton_crear text-light">
    <h2 class="text-center p-2 m-2 fs-1 fw-bold text-dark" >Listado de Mascotas</h2>
{{-- <a href="personas/create" class="btn btn-light boton_crear">Crear</a> --}}
</div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">Especie</th>
                <th scope="col">Sexo</th>
                <th scope="col">Año nacimiento</th>
                <th scope="col">Dueño</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($mascotas as $unaMascota)
                <tr>
                    <td>{{$unaMascota->id}}</td>
                    <td>{{$unaMascota->nombre}}</td>
                    <td>{{$unaMascota->raza}}</td>
                    <td>{{$unaMascota->especie}}</td>
                    <td>{{$unaMascota->sexo}}</td>
                    <td>{{$unaMascota->anioNacimiento}}</td>
                    <td>{{$unaMascota->persona->nombre." ".$unaMascota->persona->apellido}}</td>
                    <td>
                            <input type="hidden" name="urlAnterior" value="{{Request::path()}}">
                            <a href="{{ route('mascotas.show',$unaMascota->id)}}" class="btn btn" title="Ver"><i class="fa-solid fa-eye"></i></a>
                            <a href="/mascotas/{{$unaMascota->id}}/edit" class="btn btn" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            
                            <button class="btn btn eliminar" title="Eliminar" id="{{$unaMascota->id}} " value= '{{$unaMascota->id}}'><i class="fa-solid fa-trash-can"></i></button>
                        </form>
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
                         location.href = '/mascotas/'+cod+'/delete'; 

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