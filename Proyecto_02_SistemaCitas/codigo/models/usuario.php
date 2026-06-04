<?php
require_once("../config/conexion.php");

class Usuario {

    public static function registrar($nombre, $email, $password) {
        global $conexion;
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$nombre, $email, $passHash]);
    }

    public static function login($email, $password) {
        global $conexion;

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // este nuevo segmento de código se encarga de obtener los datos del usuario por su id, 
    // esto con el fin de mostrar los datos en la vista de edición de perfil
    public static function obtenerPorId($id) {
        global $conexion;

        $sql = "SELECT id, nombre, email FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // aqui se encuentra el nuevo método para actualizar los datos del usuario, 
    // este método recibe el id del usuario, el nuevo nombre, el nuevo email 
    public static function actualizar($id, $nombre, $email, $password = null) {
        global $conexion;

        if (!empty($password)) {
            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([$nombre, $email, $passHash, $id]);
        } else {
            $sql = "UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([$nombre, $email, $id]);
        }
    }
}
?>