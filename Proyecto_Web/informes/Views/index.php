<?php
include '../Controller/mostrar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMES DE MEDICAMENTOS - CENARES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type= "text/css" href="../public/css/estilos.css">
    <script src= "../public/js/bootstrap.bundle.min.js"></script>
    <img src="../img/cenares.jpg" alt="SISTEMA DE ABASTECIMIENTO CENARES">
</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div clas="row">
                <div class="col-12">
                    <h4><B>INFORMES DE MEDICAMENTOS</B>
                        <br></br>
                        <a href="ingresarview.php" class="btn btn-primary float-Center">Nuevo</a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Stock</th>
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
                                    <td><?php  echo $row['codigo']; ?> </td>
                                    <td><?php  echo $row['descripcion']; ?> </td>
                                    <td><?php  echo $row['stock']; ?> </td>
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
</body>
</html>