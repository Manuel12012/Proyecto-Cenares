<?php 

require '../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $descripcion=$_POST['descripcion'];
    $stock=$_POST['stock'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;

    if($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("UPDATE informes SET codigo=?, descripcion=?, inventariable=?, stock=? WHERE id=?");
    $resultado =$query-> execute(array($codigo,$descripcion,$inventariable,$stock,$id));

    if($resultado){
        $correcto=true;
    }
} else{
    $codigo= $_POST['codigo'];
    $descripcion= $_POST['descripcion'];
    $stock= $_POST['stock'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;
    
    if ($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("INSERT INTO informes (codigo, descripcion, inventariable, stock,activo)
    VALUES (:cod, :descr, :inv, :sto, 1)");
    $resultado =$query-> execute(array('cod'=> $codigo, 'descr'=> $descripcion, 'inv'=> $inventariable,
    'sto'=> $stock));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>