<?php
require_once 'Config/database.php';
require_once 'Controller/MedicamentosController.php';

$controller = new MedicamentosController($conn);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'agregar') {
        $controller->agregar();
    } elseif ($action == 'editar') {
        $id = $_GET['id'];
        $controller->editar($id);
    } elseif ($action == 'eliminar') {
        $id = $_GET['id'];
        $controller->eliminar($id);
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>
