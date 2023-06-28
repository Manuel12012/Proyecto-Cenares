<!DOCTYPE html>
<html>
<head>
    <title>Lista de Medicamentos</title>
</head>
<body>
    <h1>Lista de Medicamentos</h1>
    <a href="agregar_medicamento.php">Agregar Medicamento</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Fecha de Vencimiento</th>
            <th>Cantidad de Medicamento</th>
        </tr>
        <?php foreach ($medicamentos as $medicamento): ?>
            <tr>
                <td><?php echo $medicamento['id']; ?></td>
                <td><?php echo $medicamento['nombre']; ?></td>
                <td><?php echo $medicamento['tipo']; ?></td>
                <td><?php echo $medicamento['fechaVencimiento']; ?></td>
                <td><?php echo $medicamento['cantidadMedicamento']; ?></td>
                <td>
                    <a href="editar_medicamento.php?id=<?php echo $medicamento['id']; ?>">Editar</a>
                    <a href="eliminar_medicamento.php?id=<?php echo $medicamento['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
