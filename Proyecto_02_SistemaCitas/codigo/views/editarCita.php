<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estilos.css">
    <title>Editar la cita</title>
</head>
<body>
    <form method="POST" action="../controllers/citaController.php">

    <input type="hidden" name="id" value="<?= $cita['id'] ?>">

    <label>Fecha:</label>
    <input type="date" name="fecha" value="<?= $cita['fecha'] ?>" min="<?= date('Y-m-d') ?>" required>

    <label>Hora:</label>
    <input type="time" name="hora" value="<?= $cita['hora'] ?>" required>

    <button type="submit" name="actualizar">Actualizar</button>
</form>
    
</body>
</html>