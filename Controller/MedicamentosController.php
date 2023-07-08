<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$numElimina = 0;

// Obtener medicamento por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("SELECT nombre, tipo, fechaVencimiento, cantidad FROM medicamento WHERE id = :id AND activo = :activo");
    $query->execute(['id' => $id, 'activo' => $activo]);
    $num = $query->rowCount();

    if ($num > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit();
    }
}

// Eliminar medicamento por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("DELETE FROM medicamento WHERE id = ?");
$query->execute([$id]);

    $numElimina = $query->rowCount();
}

$correcto = false;

// Actualizar o agregar medicamento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $fechaVencimiento = isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE medicamento SET nombre = :nombre, tipo = :tipo, fechaVencimiento = :fechaVencimiento, cantidad = :cantidad WHERE id = :id");
        $resultado = $query->execute(['nombre' => $nombre, 'tipo' => $tipo, 'fechaVencimiento' => $fechaVencimiento, 'cantidad' => $cantidad, 'id' => $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidad, activo) VALUES (:nombre, :tipo, :fechaVencimiento, :cantidad, :activo)");
        $resultado = $query->execute(['nombre' => $nombre, 'tipo' => $tipo, 'fechaVencimiento' => $fechaVencimiento, 'cantidad' => $cantidad, 'activo' => $activo]);

        if ($resultado) {
            $correcto = true;
            $lastInsertId = $con->lastInsertId();
            echo $lastInsertId;
        }
    }
}

// Obtener todos los medicamentos
$comando = $con->prepare("SELECT id, nombre, tipo, fechaVencimiento, cantidad FROM medicamento WHERE activo = :activo ORDER BY id ASC");
$comando->execute(['activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
