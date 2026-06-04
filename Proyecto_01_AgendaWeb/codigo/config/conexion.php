<?php
// Se crea la conexion con la base de datos MySQL apache
// Parametros: servidor, usuario, contraseña, nombre_base_datos
$conexion = new mysqli("localhost", "root", "", "agenda_web");


// Verifica si ocurrio un error al conectar
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>