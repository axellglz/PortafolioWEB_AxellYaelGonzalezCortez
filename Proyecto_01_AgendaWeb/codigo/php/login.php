<?php
// Inicia la sesión para poder usar variables de sesión
session_start();
// Incluye la conexión a la base de datos
require("../config/conexion.php");

// Captura datos enviados desde el formulario
$correo = $_POST['correo'];
$password = sha1($_POST['password']); // Se aplica hash para comparar

// Consulta para verificar credenciales
$sql = "SELECT * FROM usuarios 
WHERE correo='$correo' AND password='$password'";

$resultado = $conexion->query($sql);

// Verifica si existe un usuario con esas credenciales
if($resultado->num_rows > 0){

// Obtiene los datos del usuario
    $usuario = $resultado->fetch_assoc();

    //Gurada el id del usuario en la sesion
    $_SESSION['usuario_id'] = $usuario['id'];

    //Redirige al dashboard
    header("Location: ../views/dashboard.php");
}else{
    echo "Datos incorrectos";
}
?>