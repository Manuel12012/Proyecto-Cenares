<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="../../css/style.css" as="style">
    <link href="../../css/style.css" rel="stylesheet">
   
   <title>Inicio de sesión</title>
</head>

<body>
<header>   
        <h1 class="titulo">CENARES</h1>
    </header>    
           
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="../../Views/InicioUsuario/index.php">Inicio</a>   
            <a href="../../Views/Iniciarsesion/index.php">Iniciar Sesion</a>
        </nav>
    </div>
            <section class="hero">
        <div class="contenido-hero">
        <h2 class="Subtitulo">Centro Nacional de Abastecimiento  de Recursos Estrategicos en Salud</h2>
        </div>
    </section>
    
            <?php
            include ('../../Model/database.php');
            include ('../../Controller/UsuarioController.php');
             ?>
            <main class="contenedor sombra">
            <form method="post" action="" class="formulario">
            <fieldset>
            <legend>Bienvenido</legend> 

            <section class="servicio">   
            <div class="icono-login">
                    <svg fill="#000000" width="130px" height="130px" viewBox="0 0 24 24" id="user-6" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M13,12H11a8,8,0,0,0-8,8,2,2,0,0,0,2,2H19a2,2,0,0,0,2-2A8,8,0,0,0,13,12Z" style="fill: #2ca9bc;"></path><circle id="primary" cx="12" cy="8" r="6" style="fill: #000000;"></circle></g></svg>               <div class="div">
                  </div>
                </section> 
                <div class="contenedor-campos-login">
                <div class="campo">
                        <label>Usuario:</label>
                            <input id="usuario" type="text" class="input-text" name="usuario" placeholder="Ingrese usuario">
               </div>
                    <div class="campo">
                        <label>Contraseña:</label>
                            <input type="password" id="input" class="input-text" name="password" placeholder="Ingrese contraseña">
                    </div>
                </div>
            <input name="btningresar" class="boton" type="submit" value="INICIAR SESION">
         
        </form>

  <fieldset></fieldset>
</main>

<footer class="footer">
            <p>Todos los derechos reservados.</p>
        </footer>
</body>

</html>

