<?php 

require '../../Model/database.php';

$db= new Database();
$con= $db->conectar();

$id= $_GET['id'];
$activo =1;

$query = $con->prepare("SELECT  nombre, email, descripcion, medicamento, cantidad FROM pedido
WHERE id= :id AND activo = :activo");
$query -> execute(['id' => $id, 'activo'=> $activo]);
$num= $query->rowCount();
if ($num > 0){
    $row =$query -> fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
}
?>