<?php
$servidor = "localhost";
$baseDeDatos = "rectificadora_bassi";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contraseña);
    // Establecer el modo de error de PDO para que lance excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos '$baseDeDatos'";
} catch (PDOException $error) {
    echo "Error en la conexión: " . $error->getMessage();
}
?>
