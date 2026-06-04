<?php
// Inicia sesion para poder destruirla 
session_start();

//Elimina todas las variables de sesion
session_destroy();

// Redirige al login
header("Location: ../views/login.html");
?>