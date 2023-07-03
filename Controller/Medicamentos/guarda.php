<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $tipo=$_POST['tipo'];
    $fechaVencimiento=isset($_POST['fechaVencimiento']);
    $cantidad=$_POST['cantidad'];

    if($cantidad == ''){
        $cantidad= 0;
    }

    $query = $con->prepare("UPDATE medicamento SET nombre=?, tipo=?, fechaVencimiento=?, cantidad=? 
     WHERE id=?");
    $resultado =$query-> execute(array($nombre,$tipo,$fechaVencimiento,$cantidad,$id));

    if($resultado){
        $correcto=true;
    }
    } else{
    $nombre= $_POST['nombre'];
    $tipo= $_POST['tipo'];
    $fechaVencimiento=isset($_POST['fechaVencimiento']);
    $cantidad= $_POST['cantidad'];
    
    if ($cantidad == ''){
        $cantidad= 0;
    }

    $query = $con->prepare("INSERT INTO medicamento (nombre, tipo, fechaVencimiento, cantidad, activo)
    VALUES (:nombre, :tipo, :fechaVencimiento, :cantidad, 1)");
    $resultado =$query-> execute(array('nombre'=> $nombre, 'tipo'=> $tipo, 'fechaVencimiento'=> $fechaVencimiento,
    'cantidad'=> $cantidad));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>