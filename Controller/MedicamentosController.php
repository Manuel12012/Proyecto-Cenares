<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $activo = 1;

    $query = $con->prepare("SELECT nombre, tipo, fechaVencimiento, cantidad FROM medicamento WHERE id = :id AND activo = :activo");
    $query->execute(['id' => $id, 'activo' => $activo]);
    $num = $query->rowCount();

    if ($num > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $fechaVencimiento = isset($_POST['fechaVencimiento']) ? $_POST['fechaVencimiento'] : null;
    $cantidad = $_POST['cantidad'];

    if ($id) {
        if ($cantidad == '') {
            $cantidad = 0;
        }

        $query = $con->prepare("UPDATE medicamento SET nombre = ?, tipo = ?, fechaVencimiento = ?, cantidad = ? WHERE id = ?");
        $resultado = $query->execute([$nombre, $tipo, $fechaVencimiento, $cantidad, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        if ($cantidad == '') {
            $cantidad = 0;
        }

        $query = $con->prepare("INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidad, activo) VALUES (:nombre, :tipo, :fechaVencimiento, :cantidad, 1)");
        $resultado = $query->execute(['nombre' => $nombre, 'tipo' => $tipo, 'fechaVencimiento' => $fechaVencimiento, 'cantidad' => $cantidad]);

        if ($resultado) {
            $correcto = true;
            $idMedicamento = $con->lastInsertId();
            echo $idMedicamento;
        }
    }
}

$activo = 1;

$comando = $con->prepare("SELECT id, nombre, tipo, fechaVencimiento, cantidad FROM medicamento WHERE activo = :mi_activo ORDER BY nombre ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
