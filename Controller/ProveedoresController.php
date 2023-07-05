<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $activo = 1;

    $query = $con->prepare("SELECT nombre, direccion, telefono, email FROM proveedor WHERE id = :id AND activo = :activo");
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
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;

    if ($id) {
        $query = $con->prepare("UPDATE proveedor SET nombre = ?, direccion = ?, telefono = ?, email = ?, inventariable = ? WHERE id = ?");
        $resultado = $query->execute([$nombre, $direccion, $telefono, $email, $inventariable, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO proveedor (nombre, direccion, telefono, email, inventariable, activo) VALUES (?, ?, ?, ?, ?, 1)");
        $resultado = $query->execute([$nombre, $direccion, $telefono, $email, $inventariable]);

        if ($resultado) {
            $correcto = true;
            $idProveedor = $con->lastInsertId();
            echo $idProveedor;
        }
    }
}

$activo = 1;

$comando = $con->prepare("SELECT id, nombre, direccion, telefono, email FROM proveedor WHERE activo = :mi_activo ORDER BY nombre ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
