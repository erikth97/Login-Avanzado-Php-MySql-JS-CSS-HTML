<?php
        session_start();

        if(isset($_SESSION['usuario'])){
            header("location: php/bienvenida.php");
        }

?>


    <!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login y Registro</title>
                <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="assets/css/estilos.css">
        </head>
 <body>
    
    <main>

      <div class="contendor__todo">
          <div class= "caja__trasera">
                  <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para acceder</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesion</button>
              </div>
                <div class="caja__trasera-register">
                   <h3>¿Aun No Tienes una Cuenta?</h3>
                   <p>Registrarme para Acceder</p>
                   <button id="btn__registrarse">Registrarme</button>
                </div>
           </div>

           <!--Formulario de login y Registro-->
           <div class="contenedor__login-register">

              <!--Login-->
              <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <button>Acceder</button>
               </form>

               <!--Registro-->
               <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarme</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="Password" name="password">
                    <button>Registrarme</button>
                </form>
           </div>
       </div>  
   </main>

<script src="assets/js/script.js"></script>

  </body>
</html>
