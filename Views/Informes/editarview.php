<?php require_once '../../Controller/informesController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDICION DE INFORMES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <script src= "../public/js/bootstrap.bundle.min.js"></script>
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
        <label for="id" class="form-label">Id</label>
        <input type="text" id="id" name="id" class="form-control" 
        value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>" required autofocus>
    </div>
                                        
    <div class="col-md-8">
        <label for="lugar" class="form-label">Codigo</label>
        <input type="text" id="lugar" name="lugar" class="form-control"
        value="<?php echo isset($row['lugar']) ? $row['lugar'] : ''; ?>" required>
    </div>    
    
    <div class="col-md-8">
        <label for="cantidad" class="form-label">Descripcion</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control"
        value="<?php echo isset($row['cantidad']) ? $row['cantidad'] : ''; ?>" required>
    </div> 

    <div class="col-md-8">
        <label for="medicamento" class="form-label">Medicamento</label>
        <input type="text" id="medicamento" name="medicamento" class="form-control"
        value="<?php echo isset($row['medicamento']) ? $row['medicamento'] : ''; ?>" required>
    </div> 

    <div class="col-md-8">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="datetime-local" id="fecha" name="fecha" class="form-control"
        value="<?php echo isset($row['fecha']) ? $row['fecha'] : ''; ?>" required>
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