<?php 
$servidor="localhost";
$baseDeDatos ="rectificadora_bassi";
$usuario = "root";
$contraseña = "";


try{
$conexion= new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contraseña);
echo "Conexion realizada...";
}
catch(Exception $error){
    echo $error->getMessage();
}

?> 