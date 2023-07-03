<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;

    if($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("UPDATE proveedor SET nombre=?, direccion=?, telefono=?, email=? 
    , inventariable=? WHERE id=?");
    $resultado =$query-> execute(array($nombre,$direccion,$telefono,$email,$inventariable,$id));

    if($resultado){
        $correcto=true;
    }
    } else{
    $nombre= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;
    


    $query = $con->prepare("INSERT INTO proveedor (nombre, direccion, telefono, email,inventariable,activo)
    VALUES (:nombre, :direccion, :telefono, :email, :inventariable, 1)");
    $resultado =$query-> execute(array('nombre'=> $nombre, 'direccion'=> $direccion, 'telefono'=> $telefono,
    'email'=> $email, 'inventariable'=>$inventariable));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>