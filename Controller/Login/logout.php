<?php
// Finalizar la sesión y redirigir al usuario a la página de inicio de sesión

session_start();
session_destroy();
header("Location: index.php");
exit;
