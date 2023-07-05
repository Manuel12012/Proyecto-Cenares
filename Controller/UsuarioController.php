<?php
if(!empty($_POST["btningresar"])){
    if(empty($_POST["usuario"]) and empty($_POST["password"])){
        echo 'Los campos estan vacios';
    }
    else {
        $usuario=$_POST["usuario"];
        $clave=$_POST["password"];
        $sql=$conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'");

        if($datos=$sql->fetch_object()){
            header("location:Views/Inicio/index.php");
        }

        else{
            echo 'Acceso denegado';
        }
    }
}
?>
