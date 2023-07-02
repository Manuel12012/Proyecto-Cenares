<?php
require  '../../Model/database.php';

$db = new Database();
$con= $db->conectar();

$activo= 1;

$comando = $con->prepare("SELECT id, nombre, email, descripcion, medicamento,cantidad FROM pedido
WHERE activo=:mi_activo ORDER BY nombre ASC");
$comando->execute(['mi_activo'=> $activo]);
$resultado = $comando ->fetchAll(PDO::FETCH_ASSOC);

?>