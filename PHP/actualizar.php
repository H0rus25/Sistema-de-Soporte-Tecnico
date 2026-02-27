<?php 
include 'db.php';

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$DescripcionFalla = $_POST['falla'];

//Se verifica si ambos campos no estan vacios
if (!(empty($_POST['usuario'])) and !(empty($_POST['falla'])) and !(empty($_POST['id']))){

    $sql = "UPDATE tickets SET usuario = ?, descripcion_falla = ? WHERE id = ?";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([$usuario, $DescripcionFalla, $id]);

    //Para regresar al archivo index.php
    header("Location: index.php");
    exit();
}


?>
