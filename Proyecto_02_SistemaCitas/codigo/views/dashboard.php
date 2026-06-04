<?php
session_start();
require_once("../models/cita.php");

// Redirigir si no hay sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit();
}

$citas = Cita::obtener($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>

<div class="container">
    <h2>Mis Citas</h2>

    <!-- FORMULARIO CREAR CITA -->
    <form method="POST" action="../controllers/citaController.php">
        <input type="date" name="fecha" min="<?= date('Y-m-d') ?>" required>
        <input type="time" name="hora" required>
        <button name="crear">Agregar</button>
    </form>

    <!-- TABLA -->
    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Acciones</th>
        </tr>

        <?php if ($citas): ?>
            <?php foreach ($citas as $cita): ?>
            <tr>
                <td><?= htmlspecialchars($cita['fecha']) ?></td>
                <td><?= htmlspecialchars($cita['hora']) ?></td>
                <td>
                    <a href="../controllers/citaController.php?eliminar=<?= $cita['id'] ?>">
                        Eliminar
                    </a>
                        <a href="../controllers/citaController.php?editar=<?= $cita['id'] ?>">
    Editar
</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No tienes citas registradas</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>
    <a href="../views/editarUser.php">Editar perfil</a>
    <!-- LOGOUT -->
    <a href="../index.php">Cerrar sesión</a>
    
</div>

</body>
</html>