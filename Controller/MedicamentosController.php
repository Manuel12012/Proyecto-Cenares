<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$numElimina = 0;

// Obtener informe por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("SELECT  nombre, tipo, fechaVencimiento, cantidad FROM medicamento
        WHERE id = :id AND activo = :activo");
    $query->execute(['id' => $id, 'activo' => $activo]);
    $num = $query->rowCount();
    
    if ($num > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit();
    }
}

// Eliminar informe por ID
if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    $query = $con->prepare("DELETE FROM medicamento WHERE id = ?");
    $query->execute([$deleteId]);
    $numElimina = $query->rowCount();
}

$correcto = false;

// Actualizar o agregar informe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $fechaVencimiento = isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : '';

    $cantidad = $_POST['cantidad'];

    if ($cantidad == '') {
        $cantidad = 0;
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE medicamento SET nombre = ?, tipo = ?, fechaVencimiento = ?, cantidad = cantidad WHERE id = ?");
        $resultado = $query->execute([$nombre, $tipo, $fechaVencimiento, $cantidad, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidad, activo)
            VALUES (:nombre, :tipo, :fechaVencimiento, :cantidad, 1)");
        $resultado = $query->execute(['nombre' => $nombre, 'tipo' => $tipo, 'fechaVencimiento' => $fechaVencimiento, 'cantidad' => $cantidad]);

        if ($resultado) {
            $correcto = true;
            echo $con->lastInsertId();
        }
    }
}

// Obtener todos los informes
$comando = $con->prepare("SELECT id, nombre, tipo, fechaVencimiento, cantidad FROM medicamento WHERE activo = :mi_activo ORDER BY id ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);


?>
