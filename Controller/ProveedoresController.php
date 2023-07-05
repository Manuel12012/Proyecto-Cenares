<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

// Obtener informe por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("SELECT nombre, direccion, telefono, email FROM proveedor
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

    $query = $con->prepare("DELETE FROM proveedor WHERE id = ?");
    $query->execute([$deleteId]);
    $numElimina = $query->rowCount();
} else {
    $numElimina = 0; // Definición de la variable $numElimina
}

$correcto = false;

// Actualizar o agregar informe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE proveedor SET nombre = ?, direccion = ?, telefono = ?, email = ? WHERE id = ?");
        $resultado = $query->execute([$nombre, $direccion, $telefono, $email, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO proveedor (nombre, direccion, telefono, email, activo)
            VALUES (:nombre, :direccion, :telefono, :email, 1)");
        $resultado = $query->execute(['nombre' => $nombre, 'direccion' => $direccion, 'telefono' => $telefono, 'email' => $email]);

        if ($resultado) {
            $correcto = true;
            echo $con->lastInsertId();
        }
    }
}

// Obtener todos los informes
$comando = $con->prepare("SELECT id, nombre, direccion, telefono, email FROM proveedor WHERE activo = :mi_activo ORDER BY id ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
