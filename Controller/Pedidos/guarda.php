<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $email=$_POST['email'];
    $descripcion=$_POST['descripcion'];
    $medicamento=$_POST['medicamento'];
    $cantidad=$_POST['cantidad'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;

    if($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("UPDATE pedido SET nombre=?, email=?, descripcion=?, medicamento=? 
    , cantidad=?, inventariable=? WHERE id=?");
    $resultado =$query-> execute(array($nombre,$email,$descripcion,$medicamento,$cantidad,$inventariable,$id));

    if($resultado){
        $correcto=true;
    }
    } else{
    $nombre= $_POST['nombre'];
    $tipo= $_POST['tipo'];
    $email= $_POST['email'];
    $descripcion= $_POST['descripcion'];
    $medicamento=$_POST['medicamento'];
    $cantidad=$_POST['cantidad'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;
    
    if ($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("INSERT INTO pedido (nombre, email, descripcion, medicamento, cantidad ,inventariable,activo)
    VALUES (:nombre, :email, :descripcion, :medicamento, :cantidad, :inventariable, 1)");
    $resultado =$query-> execute(array('nombre'=> $nombre, 'email'=> $email, 'descripcion'=> $descripcion,
    'medicamento'=> $medicamento,'cantidad'=> $cantidad, 'inventariable'=>$inventariable));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>