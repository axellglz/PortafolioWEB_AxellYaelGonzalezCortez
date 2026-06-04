<?php
session_start();
require("../config/conexion.php");

// Captura datos el formulario
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];

// Obtiene id del usuario autenticado
$usuario_id = $_SESSION['usuario_id'];

// Insertar la cita asociada al usuario
$sql = "INSERT INTO citas (titulo, fecha, usuario_id)
VALUES ('$titulo', '$fecha', '$usuario_id')";

if($conexion->query($sql)){
    header("Location: ../views/dashboard.php");
}else{
    echo "Error";
}
?>