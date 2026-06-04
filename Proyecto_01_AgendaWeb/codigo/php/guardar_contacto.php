<?php
session_start();
require("../config/conexion.php");

// Captura datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];

// Obtiene el id del usuario autenticado
$usuario_id = $_SESSION['usuario_id'];

//Inserta el contacto asociado al usuario
$sql = "INSERT INTO contactos (nombre, telefono, usuario_id)
VALUES ('$nombre', '$telefono', '$usuario_id')";

if($conexion->query($sql)){
    header("Location: ../views/dashboard.php");
}else{
    echo "Error";
}
?>