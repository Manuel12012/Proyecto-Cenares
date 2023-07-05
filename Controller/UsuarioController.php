<?php


if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) && empty($_POST["password"])) {
        echo 'Los campos están vacíos';
    } else {
        $usuario = $_POST["usuario"];
        $clave = $_POST["password"];
        
        // Crear una instancia de la clase Database
        $db = new Database();
        $con = $db->conectar();
        
        $sql = $con->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'");

        if ($datos = $sql->fetch(PDO::FETCH_OBJ)) {
            header("Location: ../InicioAdmin/index.php");
        } else {
            echo 'Acceso denegado';
        }
    }
}

?>
