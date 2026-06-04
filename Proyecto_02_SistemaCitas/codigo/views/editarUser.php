<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estilos.css">
    <title>Editar datos del usuario</title>
</head>
<body>
    <h2>Editar datos del usuario</h2>
    <form method="POST" action="../controllers/userController.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>