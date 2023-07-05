<?php

require '../../Model/database.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

// Obtener informe por ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $con->prepare("SELECT codigo, descripción, inventariable, stock FROM informes
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

    $query = $con->prepare("DELETE FROM informes WHERE id = ?");
    $query->execute([$deleteId]);
    $numElimina = $query->rowCount();
}

$correcto = false;

// Actualizar o agregar informe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripción'];
    $stock = $_POST['stock'];
    $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;

    if ($stock == '') {
        $stock = 0;
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE informes SET codigo = ?, descripción = ?, inventariable = ?, stock = ? WHERE id = ?");
        $resultado = $query->execute([$codigo, $descripcion, $inventariable, $stock, $id]);

        if ($resultado) {
            $correcto = true;
        }
    } else {
        $query = $con->prepare("INSERT INTO informes (codigo, descripción, inventariable, stock, activo)
            VALUES (:cod, :descr, :inv, :sto, 1)");
        $resultado = $query->execute(['cod' => $codigo, 'descr' => $descripcion, 'inv' => $inventariable, 'sto' => $stock]);

        if ($resultado) {
            $correcto = true;
            echo $con->lastInsertId();
        }
    }
}

// Obtener todos los informes
$comando = $con->prepare("SELECT id, codigo, descripción, stock FROM informes WHERE activo = :mi_activo ORDER BY codigo ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
