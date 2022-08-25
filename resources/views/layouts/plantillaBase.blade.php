
<!doctype html>
<html lang="en">
  <head>
    <!--  iconos -->
    <script src="https://kit.fontawesome.com/b610c83f26.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
      <!-- estilos CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('estiloLogin.css')}}">
    <link rel="icon" href={{asset('iconos/huella.png')}} >
          <!-- data table CSS-->
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<title>Usuario Veterinario</title>

<style>
  .boton_crear {
  
  color:#000000;
  
  margin: 10 0 10 -10 !important;
  width: 160 !important;
  border-radius: 20px !important;
  
   
  }
  table th{
      background-color: rgba(100, 83, 153, 1) !important;
      color:#ffffff;
  }
  table td{
      background-color: rgba(100, 83, 153, 0.1) !important;
      color:#000000;
  }
  .caja_tabla-2{
  
      margin: 15px;
  }

.navbar-expand-lg .navbar-nav .nav-link{
  padding-left: 4rem;
}


  </style>

<!-- Inicio de Menu -->
<body class="fondo_veterinario">
<nav class="navbar navbar-expand-lg navbar-light  bg-light m-0 p-3" >
  <div class="container-fluid" >
    <div class="logo">
      <img src="{{asset('iconos/logo-sin-fondo.png')}}" alt="logo_principal" >
       </div>
   
 
      <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item p-2">
              <a class="nav-link " href="/vistaRoles/veterinario"  title="Inicio"><i class="fa-solid fa-house"></i> Inicio</a>
            
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/turnos" title="Turnos"><i class="fa-solid fa-calendar-days"></i> Turnos</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/personas" title="Clientes"><i class="fa-solid fa-person"></i> Clientes</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/mascotas" title="Mascotas"><i class="fa-solid fa-dog"></i> Mascotas</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/historialesClinicos" title="Ver Historial"><i class="fa-solid fa-notes-medical"></i> Ver Historial</a>
            </li>
                    
              <li class="nav-item dropdown p-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" title="Usuario"> </i><i class="fa-solid fa-stethoscope"></i> Usuario:Medico</a>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Cerrar</a></li>

              </ul>
              </li>





   
   

  </div>
   
  

   

</nav>

</div>

<div class="container">
  @yield('contenido')
</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 


</body>