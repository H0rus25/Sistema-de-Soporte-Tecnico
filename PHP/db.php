<?php
$host = "sistema"; //Cambiar al momento de implementar docker
$nombreBaseDeDatos = "soporte_tecnico";
$usuario = "root";
$contraseña = "123456";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$nombreBaseDeDatos", $usuario, $contraseña); //Conectando a la base de datos

    $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Para que avise de los errores en consultas SQL
}

//Imprime un mensaje si hubo un error de conexion
catch(PDOException $e){
    echo "Error de conexion: ". $e->getMessage(); 
}
?>