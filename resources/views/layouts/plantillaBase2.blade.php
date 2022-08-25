
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
    <!-- jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin ="anonymous"></script>
<title>Usuario Veterinario</title>

<style>
     .fondo_cajero{
  
  color:#000000!important;

  
   
  } .a{
    color:#ffffff!important;
  }



.navbar-expand-lg .navbar-nav .nav-link{
  padding-left: 1rem;
  color: rgb(255, 0, 30) !important;
}. a:hover{
    color:#ffffff;
  
}
table th{
      background-color: rgba(255, 52, 11) !important;
      color:#ffffff;
  }
  table td{
      background-color: rgba(255, 52, 11,0.2) !important;
      color:#000000;
  }
  .caja_tabla-2{
  
      margin: 15px;
  }
  .btn-link:hover{
    
    color: red;
  }

  .btn-link {
    text-decoration: none; 
    color: red;
  }
  #notificacion:focus {
    outline: none;
    box-shadow: none;
}
  </style>

<!-- Inicio de Menu -->
<body class="fondo_cajero">
<nav class="navbar navbar-expand-lg navbar-light  bg-light m-0 p-3 text-info" >
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
              <a class="nav-link " href="/vistaRoles/cajero"  title="Inicio"><i class="fa-solid fa-house"></i> Inicio</a>
            
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/articulos" title="Articulos"><i class="fa-solid fa-store"></i> Articulos</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/ventas" title="Realizar Ventas"><i class="fa-solid fa-cart-shopping"></i> Ventas</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/categorias" title="Categorias"><i class="fa-solid fa-book-open"></i> Categorias</a>
            </li>
            <li class="nav-item p-2">
              <a class="nav-link" href="/vencimientos" title="Vencimientos de Productos"><i class="fa-solid fa-calendar-days"></i> Vencimientos </a>
            </li>
            <button type="nav-link" class="btn btn-light position-relative text-danger " id ="notificacion" ><i class="fa-solid fa-bell"></i> Notificaciones 
            @if(session()->exists('notificacion'))
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{session('notificacion')}} 
                 <span class="visually-hidden">unread messages</span>
                </span>
            @endif
            </button>     
              <li class="nav-item dropdown p-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" title="Usuario"> </i> <i class="fa-solid fa-cash-register"></i>Usuario:Cajero</a>
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
 
<script>
 var notificacion = document.getElementById('notificacion');
 notificacion.blur();
notificacion.addEventListener('click',function(){
  
  location.href='/notificaciones';
});


</script>

</body>