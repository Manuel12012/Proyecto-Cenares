<?php
class Medicamento {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listarMedicamentos() {
        $query = "SELECT * FROM medicamento";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function agregarMedicamento($nombre, $tipo, $fechaVencimiento, $cantidadMedicamento) {
        $query = "INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidadMedicamento) 
        VALUES (:nombre, :tipo, :fechaVencimiento, :cantidadMedicamento)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':fechaVencimiento', $fechaVencimiento);
        $stmt->bindParam(':cantidadMedicamento', $cantidadMedicamento);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function actualizarMedicamento($id, $nombre, $tipo, $fechaVencimiento, $cantidadMedicamento) {
        $query = "UPDATE medicamento SET nombre = :nombre, tipo = :tipo, fechaVencimiento = :fechaVencimiento
        , cantidadMedicamento = :cantidadMedicamento WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':fechaVencimiento', $fechaVencimiento);
        $stmt->bindParam(':cantidadMedicamento', $cantidadMedicamento);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function eliminarMedicamento($id) {
        $query = "DELETE FROM medicamento WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>

