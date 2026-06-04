<?php
session_start();
require_once("../models/usuario.php");


// esta parte de codigo se encarga de redirigir al usuario a la vista de edición de perfil
if (isset($_GET['accion']) && $_GET['accion'] == 'perfil') {
    $usuario = Usuario::obtenerPorId($_SESSION['usuario']);
    require_once("../views/editarUser.php");
}

// segmento de codigo que pertenece a la actualización de datos del usuario
if (isset($_POST['actualizar'])) {

    $id = $_SESSION['usuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Usuario::actualizar($id, $nombre, $email, $password);

    header("Location: ../views/dashboard.php");
}
?>