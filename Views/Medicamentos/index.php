<?php
include '../../Controller/Medicamentos/mostrar.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE MEDICAMENTOS - CENARES</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="../public/css/estilos.css">
    <script src= "../../public/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="../../css/style.css" as="style">
    <link href="../../css/style.css" rel="stylesheet">
    
</head>
<body>
    <header>   
        <h1 class="titulo">CENARES</h1>
    </header>
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="../../Views/Inicio/index.php">Inicio</a>   
            <a href="../../Views/Medicamentos/index.php">Medicamentos</a>
            <a href="../../Views/Proveedores/index.php">Proveedores</a>
            <a href="../../Views/Informes/index.php">Informes</a>
            <a href="../../Views/Pedidos/index.php">Pedido</a>
            <a href="../Login/index.php">Iniciar Sesion</a>
        </nav>
    </div>

    <section class="hero">
        <div class="contenido-hero">
        <h2 class="Subtitulo">Centro Nacional de Abastecimiento  de Recursos Estrategicos en Salud</h2>
        </div>
    </section>
    <main class="contenedor sombra">
        <div class="p-3 rounded">
            <div clas="row">
                <div class="col-12">
                    <h1> Gestion de Medicamentos
                        <br></br>
                        <a href="ingresarview.php" class="boton">Nuevo</a>
                    </h1>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Cantidad</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach($resultado as $row){
                            ?>
                                <tr>
                                    <td><?php  echo $row['id']; ?> </td>
                                    <td><?php  echo $row['nombre']; ?> </td>
                                    <td><?php  echo $row['tipo']; ?> </td>
                                    <td><?php  echo $row['fechaVencimiento']; ?> </td>
                                    <td><?php  echo $row['cantidad']; ?> </td>
                                    <td> <a href="editarview.php?id=<?php echo $row['id'];?>"
                                    class="btn btn-warning">Editar</a></td>
                                    <td> <a href="eliminarview.php?id=<?php echo $row['id'];?>"
                                    class="btn btn-warning">Eliminar</a></td>                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>  
    <footer class="footer">
            <p>Todos los derechos reservados.</p>
        </footer> 
</body>
</html>