<?php
$host = "localhost";
$db = "sistema_citas";
$user = "root";
$dbport = "3307";
$pass = "";

try {
    $conexion = new PDO("mysql:host=$host;port=$dbport;dbname=$db", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>