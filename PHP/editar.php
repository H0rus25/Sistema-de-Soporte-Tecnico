<?php 
include 'db.php';

$id = $_GET['id'];
if(!(empty($_GET['id']))){

    $sql = "SELECT * FROM tickets WHERE id = ?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$id]);
    $ticket = $sentencia->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EDICION</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

        <div class="formulario">
            <h2 class="titulo-editar">Editar Reporte</h2>
            <form method="post" action="actualizar.php">
                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">

                <div class="campo">
                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php echo $ticket['usuario']; ?>" required>
                </div>

                <div class="campo">
                    <label>Descripción de la Falla:</label>
                    <textarea name="falla" required><?php echo $ticket['descripcion_falla']; ?></textarea>
                </div>

                <div class="boton_2">
                    <button type="submit" class="boton-enviar"><strong>Guardar Cambios</strong></button>
                    <a href="index.php" class="boton"><strong>Cancelar</strong></a>
                </div>
            </form> 
        </div>
        
    </body>
</html>
