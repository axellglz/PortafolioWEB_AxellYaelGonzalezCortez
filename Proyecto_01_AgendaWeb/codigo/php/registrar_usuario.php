<?php
// Incluye el archivo de conexión a la base de datos
require("../config/conexion.php");

// Captura los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = sha1($_POST['password']); // Seguridad básica

// Consulta SQL para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, correo, password)
VALUES ('$nombre', '$correo', '$password')";

// Ejecuta la consulta
if($conexion->query($sql)){
     // Si se guarda correctamente, redirige al login
    header("Location: ../views/login.html");
}else{
     // Si hay error, lo muestra
    echo "Error: " . $conexion->error;
}
?>