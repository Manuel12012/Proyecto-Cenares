<!DOCTYPE html>
<html>
<head>
    <title>Agregar Medicamento</title>
</head>
<body>
    <h1>Agregar Medicamento</h1>
    <form method="POST" action="agregar_medicamento.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo">
        <br>
        <label for="fechaVencimiento">Fecha de Vencimiento:</label>
        <input type="datetime-local" name="datetime" id="datetime">
        <br>
        <label for="cantidadMedicamnto">Cantidad de Medicamento:</label>
        <input type="numeric" name="cantidadMedicamento" id="cantidadMedicamento">
        <br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
