<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$correcto= false;

if (isset ($_POST['id'])){
    $id=$_POST['id'];
    $codigo=$_POST['codigo'];
    $descripción=$_POST['descripción'];
    $stock=$_POST['stock'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;

    if($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("UPDATE informes SET codigo=?, descripción=?, inventariable=?, stock=? WHERE id=?");
    $resultado =$query-> execute(array($codigo,$descripcion,$inventariable,$stock,$id));

    if($resultado){
        $correcto=true;
    }
} else{
    $codigo= $_POST['codigo'];
    $descripción= $_POST['descripción'];
    $stock= $_POST['stock'];
    $inventariable=isset($_POST['inventariable']) ?  $_POST['inventariable'] : 0;
    
    if ($stock == ''){
        $stock= 0;
    }

    $query = $con->prepare("INSERT INTO informes (codigo, descripción, inventariable, stock,activo)
    VALUES (:cod, :descr, :inv, :sto, 1)");
    $resultado =$query-> execute(array('cod'=> $codigo, 'descr'=> $descripción, 'inv'=> $inventariable,
    'sto'=> $stock));

    if ($resultado){
        $correcto= true;
        echo $con->lastInsertId();
    }
}

?>