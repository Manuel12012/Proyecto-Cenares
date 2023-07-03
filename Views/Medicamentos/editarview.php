<?php require '../../Controller/Medicamentos/editar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDICION DE MEDICAMENTOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <script src= "../../public/js/bootstrap.bundle.min.js"></script>
    <img src="../img/cenares.jpg" alt="SISTEMA DE ABASTECIMIENTO CENARES">
</head>


<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4><B>NUEVO REGISTRO</B></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardarview.php" autocomplete="off">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" 
                        value="<?php echo $row['nombre']; ?>" required autofocus>
                    </div>
                                        
                    <div class="col-md8">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <input type="text" id="tipo" name="tipo" class="form-control"
                        value ="<?php echo $row['tipo']; ?>" required>
                    </div>  
                    
                    <div class="col-md8">
                        <label for="fechaVencimiento" class="form-label">Fecha de Vencimiento:</label>
                        <input type="datetime-local" id="datetime" name="datetime" class="form-control"
                        value ="<?php echo $row['fechaVencimiento']; ?>" required>
                    </div> 

                    <div class="col-md-4">
                        <label for="cantidad" class="form-label">Cantidades en CAJAS</label>
                        <input type="cantidad" id="cantidad" name="cantidad" value ="<?php echo $row['cantidad'];?>"
                        class="form-control">
                    </div>

                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="index.php">Regresar</a>
                        <button type="submit" class="btn btn-primary"name="registro">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>   
</body>
</html>