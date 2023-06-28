<!DOCTYPE html>
<html>
<head>
    <title>Editar Medicamento</title>
</head>
<body>
    <h1>Editar Medicamento</h1>
    <form method="POST" action="editar_medicamento.php?id=<?php echo $medicamento['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $medicamento['nombre']; ?>">
        <br>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $medicamento['tipo']; ?>">
        <br>
        <label for="fechaMedicamento">Fecha de Medicamento:</label>
        <input type="datetime-local" name="datetime-local" id="datetime-local" value="<?php echo $medicamento['fechaMedicamento']; ?>">
        <br>
        <label for="cantidadMedicamento">Cantidad de Medicamento:</label>
        <input type="numeric" name="cantidadMedicamento" id="cantidadMedicamento" value="<?php echo $medicamento['cantidadMedicamento']; ?>">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
