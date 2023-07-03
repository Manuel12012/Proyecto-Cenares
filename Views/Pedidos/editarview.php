<?php require '../../Controller/Pedidos/editar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION DE PEDIDOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <script src= "../../public/js/bootstrap.bundle.min.js"></script>
    <img src="../../assets/img/cenares.jpg" alt="SISTEMA DE ABASTECIMIENTO CENARES">
</head>


<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4><B>EDITAR PEDIDO</B></h4>
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
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control"
                        value ="<?php echo $row['email']; ?>" required>
                    </div>  
                    
                    <div class="col-md8">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control"
                        value ="<?php echo $row['descripcion']; ?>" required>
                    </div> 

                    <div class="col-md8">
                        <label for="medicamento" class="form-label">Medicamento:</label>
                        <input type="text" id="medicamento" name="medicamento" class="form-control"
                        value ="<?php echo $row['medicamento']; ?>" required>
                    </div> 

                    <div class="col-md-4">
                        <label for="cantidad" class="form-label">Cantidades en CAJAS</label>
                        <input type="number" id="cantidad" name="cantidad" value ="<?php echo $row['cantidad'];?>"
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