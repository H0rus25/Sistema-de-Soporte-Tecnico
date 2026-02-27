<?php
include 'db.php';

$usuario = $_POST['usuario'];
$DescripcionFalla = $_POST['falla'];

//Se verifica si ambos campos no estan vacios
if (!(empty($_POST['usuario'])) and !(empty($_POST['falla']))){

    $sql = "INSERT INTO tickets (usuario, descripcion_falla, resuelto) VALUES (?,?,?)";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$usuario, $DescripcionFalla, 0]);

    //Para regresar al archivo index.php
    header("Location: index.php");
    exit();
}




?>