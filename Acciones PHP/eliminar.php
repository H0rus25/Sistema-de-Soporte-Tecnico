<?php
include 'db.php';
$eliminarID = $_GET['id'];

if (!(empty($_GET['id']))){

    $sql = "DELETE FROM tickets WHERE id = ?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$eliminarID]);

    header("Location: index.php");
    exit();
}


?>