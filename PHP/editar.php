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
    </head>
    <body>


        <h2>Editar Ticket</h2>
        <form method="post" action="actualizar.php">
            <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">

            <div>
                <label>Usuario:</label>
                <input type="text" name="usuario" value="<?php echo $ticket['usuario']; ?>" required>
            </div>

            <div>
                <label>Descripción de la Falla:</label>
                <textarea name="falla" required><?php echo $ticket['descripcion_falla']; ?></textarea>
            </div>

            <button type="submit">Guardar Cambios</button>
            <a href="index.php">Cancelar</a>
        </form>

        
    </body>
</html>
