<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('estiloLogin.css')}}">
    <title>Veterinaria-Ingresar</title>
  </head>

  <body class="login_body">
   
   <div class="container-fluid d-flex justify-content-center m-4">
   <div class="row">
    <div class="col col-login m-3 p-1">
        <div class="shadow p-3 mb-5 tarjeta">
            <div class="d-flex justify-content-center">
            <img src="./iconos/logo_login.png" alt="consulta"  height="160" width="160" >
            </div>
        <form class="card-body" action="{{'/vistaRoles'}}">
       
          <h4 class=" text-center mb-3 p-1 ">Ingrese a su cuenta</h4>
          <div class="form-floating mb-3">
            <input type="Usuario" class="form-control" id="floatingInput" placeholder="nombre@gmail.com">
            <label for="floatingInput">Usuario</label>
          </div>
          <div class="form-floating mb-1">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Contraseña</label>
          </div>
          <div class="d-flex justify-content-center pb-1">
            <a href="#" class="text-black">¿Olvidaste tu contraseña?</a>
          </div>

           <div class="d-grid m-auto p-2">
          <button class="boton_enviar" type="submit"  value="entrar">Iniciar sesión</button> 
          </div>
     
         </form>
        </div>
      </div>
    </div>
  </div>
</div>   


   
  







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>
