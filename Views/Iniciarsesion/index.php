

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
</head>
<body>
    <h2>Inicio de sesión</h2>
    <form method="post" action="../../Views/InicioAdmin/index.php">
        <?php 
include ("../../Model/database.php");
include ("../../Controller/UsuarioController.php");
?>
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br><br>
        
        <input type="submit" name="btningresar" value="Iniciar sesión">
    </form>
</body>
</html>

