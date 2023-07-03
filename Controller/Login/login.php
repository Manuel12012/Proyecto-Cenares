<?php
// Aquí se realiza la validación del inicio de sesión y el enrutamiento

session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $contraseña = isset($_POST["contraseña"]);
    
    // Aquí puedes realizar la validación del usuario y contraseña contra una base de datos u otros mecanismos de autenticación
    
    // Por simplicidad, vamos a comprobar si el usuario y contraseña son "admin"
    if ($dni == "admin" && $contraseña == "admin") {
        // Inicio de sesión exitoso, redirigir al usuario a una página de inicio
        $_SESSION["dni"] = $dni;
        header("Location: home.php");
        exit;
    } else {
        // Credenciales inválidas, mostrar un mensaje de error en la vista
        $error = "Usuario o contraseña inválidos.";
        require "../../Views/Login/index.php";
    }
} else {
    // Mostrar el formulario de inicio de sesión por defecto
    require "../../Views/Login/index.php";
}

