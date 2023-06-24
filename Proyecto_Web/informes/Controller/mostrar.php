<?php

require  '../Model/database.php';

$db = new Database();
$con= $db->conectar();

$activo= 1;

$comando = $con->prepare("SELECT id,codigo,descripcion,stock FROM informes
WHERE activo=:mi_activo ORDER BY codigo ASC");
$comando->execute(['mi_activo'=> $activo]);
$resultado = $comando ->fetchAll(PDO::FETCH_ASSOC);

?>