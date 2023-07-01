<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO REGISTRO DE MEDICAMENTOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <script src= "../../public/js/bootstrap.bundle.min.js"></script>
    <img src="../../img/cenares.jpg" alt="SISTEMA DE ABASTECIMIENTO CENARES">
</head>


<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4><b>NUEVO REGISTRO</b> </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form class="row g-3" method="POST" action="guardarview.php" autocomplete="off">
                    <div class="col-md-4">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" required autofocus>
                    </div>
                    
                    <div class="col-md-8">
                        <label for="descripción" class="form-label">Descripción</label>
                        <input type="text" id="descripción" name="descripción" class="form-control" required>
                    </div>

                    <h5>Inventario</h5>

                    <div class="col-md12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="inventariable" name="inventariable" value="1">
                            <label for="inventariable" class="form-check-label">Usa inventario</label>
                        </div>                        
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Cantidades- CAJAS</label>
                        <input type="number" id="stock" name="stock" class="form-control">
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