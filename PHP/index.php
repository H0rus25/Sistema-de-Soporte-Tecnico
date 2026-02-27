<?php
include "db.php";

$titulo = "PROYECTO";

//Realizamos la consulta a la base de datos
$consulta = $conexion->query("SELECT * FROM tickets");

//Guarda lo que consiguio de la consulta en el arreglo tickets
$tickets = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo; ?></title>
    </head>
    <body>

        <h2>NOMBRE DE LOS ALUMNOS</h3>
        <img alt="Fotos de ambos estudiantes">
        <p>BIOGRAFIA</p>
        <p>HABILIDADES</p>

        <hr>
        <h2>Formulario para reportar una falla</h2>
        <form method="post" action="procesar.php">
            <div>
                <label for="usuario">Nombre de Usuario: </label>
                <input type="text" id="usuario" name="usuario" required>
            </div>

            <div>
                <label for="falla">Descripcion de la Falla: </label>
                <textarea id="falla" name="falla" required></textarea> 
            </div>
             
            <div>
                <button type="submit">Reportar Falla</button>
            </div>

        </form>

        <hr>
        <h2>Tabla de gestion de tickets</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($tickets as $ticket):?>

                <tr>
                    <td><?php echo $ticket['id']; ?></td>
                    <td><?php echo $ticket['usuario']; ?></td>
                    <td><?php echo $ticket['descripcion_falla']; ?></td>
                    <td><?php echo $ticket['fecha_reporte']; ?></td>
                    <td>
                        <?php echo $ticket['resuelto'] ? 'Resuelto': 'Pendiente'; ?>
                    </td>
                    <td>
                        <button><a href="cambiar_estado.php?id=<?php echo $ticket['id']; ?>&estado=<?php echo $ticket['resuelto']; ?>">Cambiar Estado</a></button>
                        <button><a href="editar.php?id=<?php echo $ticket['id']; ?>">Editar</a></button>
                        <button><a href="eliminar.php?id=<?php echo $ticket['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este ticket?')">Eliminar</a></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr>
        <h3>Reporte de Python</h3>
        <div id="reporte-python">
            <?php
            $archivo = 'reporte.txt';
            if (file_exists($archivo)){
                echo "<pre>". file_get_contents($archivo) ."</pre>";
            }
            else{
                echo "El reporte aun no se ha cargado";
            }
            ?>
        </div>
    </body>
</html>
