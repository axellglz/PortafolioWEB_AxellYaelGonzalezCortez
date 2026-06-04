<?php
// Redirige automaticamente al usuario al formulario de login
// cuando entra a la ruta principal del proyecto
header("Location: views/login.html");

// Detiene la ejecucion del script despues de la redireccion
exit();
?>