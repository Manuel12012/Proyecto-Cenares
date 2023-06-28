<?php
require_once '../Model/Medicamento.php';

class MedicamentosController {
    private $medicamento;

    public function __construct($conn) {
        $this->medicamento = new Medicamento($conn);
    }

    public function index() {
        $medicamentos = $this->medicamento->listarMedicamentos();
        require_once '../View/lista_medicamentos.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $fechaVencimiento = $_POST['fechaVencimiento'];
            $cantidadMedicamento = $_POST['cantidadMedicamento'];
            $this->medicamento->agregarMedicamento($nombre, $tipo, $fechaVencimiento, $cantidadMedicamento);
            header('Location: index.php');
        } else {
            require_once '../View/agregar_medicamento.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $fechaVencimiento = $_POST['fechaVencimiento'];
            $cantidadMedicamento = $_POST['cantidadMedicamento'];
            $this->medicamento->actualizarMedicamento($id, $nombre, $tipo, $fechaVencimiento, $cantidadMedicamento);
            header('Location: index.php');
        } else {
            $medicamento = $this->medicamento->obtenerMedicamento($id);
            require_once '../View/editar_medicamento.php';
        }
    }

    public function eliminar($id) {
        $this->medicamento->eliminarMedicamento($id);
        header('Location: index.php');
    }
}
?>
