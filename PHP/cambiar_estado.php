<?php 
include 'db.php';
$id = $_GET['id'];
$estado = $_GET['estado'];

if (!(empty($_GET['id'])) and isset($_GET['estado'])){

    $nuevoEstado = ($estado == 1) ? 0 : 1;
    $sql = "UPDATE tickets SET resuelto = ? WHERE id = ?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$nuevoEstado, $id]);

    header("Location: index.php");
    exit();
}


?>