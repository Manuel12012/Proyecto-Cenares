<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$numElimina = 0;

// Obtener informe por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("SELECT  nombre, email, descripcion, medicamento,cantidad FROM pedido
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
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("DELETE FROM pedido WHERE id = ?");
    $query->execute([$id]);
    $numElimina = $query->rowCount();
}

$correcto = false;

// Actualizar o agregar informe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']:'';
    $medicamento = $_POST['medicamento'];
    $cantidad = $_POST['cantidad'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE pedido SET nombre = ?, email = ?, descripcion = ?, medicamento = ?,
        cantidad = ? WHERE id = ?");
        $resultado = $query->execute([$nombre, $email, $descripcion, $medicamento,$cantidad, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO pedido (nombre, email, descripcion, medicamento,cantidad, activo)
            VALUES (:nombre, :email, :descripcion, :medicamento, :cantidad, 1)");
        $resultado = $query->execute(['nombre' => $nombre, 'email' => $email, 'descripcion' => $descripcion,
         'medicamento'=>$medicamento,'cantidad' => $cantidad]);

        if ($resultado) {
            $correcto = true;
            echo $con->lastInsertId();
        }
    }
}

// Obtener todos los informes
$comando = $con->prepare("SELECT id, nombre, email, descripcion, medicamento, cantidad FROM pedido WHERE activo = :mi_activo ORDER BY id ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);


?>
