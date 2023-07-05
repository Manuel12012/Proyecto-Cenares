<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $activo = 1;

    $query = $con->prepare("SELECT nombre, email, descripcion, medicamento, cantidad FROM pedido WHERE id = :id AND activo = :activo");
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
    $email = $_POST['email'];
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    $medicamento = $_POST['medicamento'];
    $cantidad = $_POST['cantidad'];

    if ($id) {
        if ($cantidad == '') {
            $cantidad = 0;
        }

        $query = $con->prepare("UPDATE pedido SET nombre = ?, email = ?, descripcion = ?, medicamento = ?, cantidad = ? WHERE id = ?");
        $resultado = $query->execute([$nombre, $email, $descripcion, $medicamento, $cantidad, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO pedido (nombre, email, descripcion, medicamento, cantidad, activo) VALUES (:nombre, :email, :descripcion, :medicamento, :cantidad, 1)");
        $resultado = $query->execute(['nombre' => $nombre, 'email' => $email, 'descripcion' => $descripcion, 'medicamento' => $medicamento, 'cantidad' => $cantidad]);

        if ($resultado) {
            $correcto = true;
            $idPedido = $con->lastInsertId();
            echo $idPedido;
        }
    }
}

$activo = 1;

$comando = $con->prepare("SELECT id, nombre, email, descripcion, medicamento, cantidad FROM pedido WHERE activo = :mi_activo ORDER BY nombre ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
