<?php
session_start();
require_once("../models/cita.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
}

$usuario_id = $_SESSION['usuario'];

if (isset($_POST['crear'])) {
    Cita::crear($_POST['fecha'], $_POST['hora'], $usuario_id);
    header("Location: ../views/dashboard.php");
}

if (isset($_GET['eliminar'])) {
    Cita::eliminar($_GET['eliminar'], $usuario_id);
    header("Location: ../views/dashboard.php");
}

if (isset($_GET['editar'])) {
    $cita = Cita::obtenerPorId($_GET['editar'], $usuario_id);

    if (!$cita) {
        die("Cita no encontrada");
    }

    require_once("../views/editarCita.php");
}

if (isset($_POST['actualizar'])) {

    date_default_timezone_set('America/Mexico_City');

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    //
    $fechaHora = strtotime("$fecha $hora");
    $ahora = time();

    if ($fechaHora < $ahora) {
        die("No puedes usar una fecha/hora pasada");
    }

    Cita::actualizar($id, $fecha, $hora, $usuario_id);

    header("Location: ../views/dashboard.php");
}
?>