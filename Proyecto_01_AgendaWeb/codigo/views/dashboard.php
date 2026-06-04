<?php
session_start();

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/proyecto_web/css/estilos.css">
</head>
<body>

<h2>Bienvenido al sistema</h2>

<p>Sesión iniciada correctamente.</p>

<a href="contacto.html">Registrar Contacto</a><br><br>
<a href="cita.html">Registrar Cita</a><br><br>
<a href="/proyecto_web/php/logout.php">Cerrar sesión</a>

</body>
</html>