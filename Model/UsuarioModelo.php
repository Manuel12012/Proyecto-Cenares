<?php
require_once 'Model/database.php';

class UsuarioModelo {
    public function validarCredenciales($dni, $contraseña) {
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE dni = :dni AND contraseña = :contraseña");
        $stmt->bindParam(':usuario', $dni);
        $stmt->bindParam(':contrasena', $contraseña);
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }
}
?>
