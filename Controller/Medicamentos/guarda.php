<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $tipo=$_POST['tipo'];
    $fechaVencimiento=$_POST['fechaVencimiento'];
    $cantidad=$_POST['cantidad'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;

    if($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("UPDATE medicamento SET nombre=?, tipo=?, fechaVencimiento=?, cantidad=? 
    , inventariable=? WHERE id=?");
    $resultado =$query-> execute(array($nombre,$tipo,$fechaVencimiento,$cantidad,$inventariable,$id));

    if($resultado){
        $correcto=true;
    }
    } else{
    $nombre= $_POST['nombre'];
    $tipo= $_POST['tipo'];
    $fechaVencimiento= $_POST['fechaVencimiento'];
    $cantidad= $_POST['cantidad'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;
    
    if ($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidad,inventariable,activo)
    VALUES (:nombre, :tipo, :fechaVencimiento, :cantidad, :inventariable, 1)");
    $resultado =$query-> execute(array('nombre'=> $nombre, 'tipo'=> $tipo, 'fechaVencimiento'=> $fechaVencimiento,
    'cantidad'=> $cantidad, 'inventariable'=>$inventariable));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>