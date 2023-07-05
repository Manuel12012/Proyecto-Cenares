<?php
require_once 'Model/UsuarioModelo.php';

class UsuarioController {
    public function inicio() {
        session_start();
        if (isset($_SESSION['dni'])) {
            header('Location: bienvenido.php');
            exit();
        }
        require_once 'Views/Iniciarsesion/inicio.php';
    }

    public function iniciarSesion() {
        session_start();
        $dni = $_POST['dni'];
        $contraseña = $_POST['contraseña'];
        
        $modelo = new UsuarioModelo();
        $valido = $modelo->validarCredenciales($dni, $contraseña);
        
        if ($valido) {
            $_SESSION['dni'] = $dni;
            header('Location: bienvenido.php');
            exit();
        } else {
            $mensaje = "Credenciales inválidas";
            require_once 'Views/Iniciarsesion/inicio.php';
        }
    }

    public function cerrarSesion() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>

