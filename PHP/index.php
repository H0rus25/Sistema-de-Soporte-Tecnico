<?php
include "db.php";

$titulo = "SISTEMA DE SOPORTE TECNICO";

//Realizamos la consulta a la base de datos
$consulta = $conexion->query("SELECT * FROM tickets");
//Guarda lo que consiguio de la consulta en el arreglo tickets
$tickets = $consulta->fetchAll(PDO::FETCH_ASSOC);

//Consulta para traer la informacion de los alumnos
$consultaPerfiles = $conexion->query("SELECT * FROM perfiles");
$perfiles = $consultaPerfiles->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

        <h2 class="titulo">EQUIPO DE DESARROLLO</h3>

        <div class="perfiles">
            <?php foreach ($perfiles as $alumno): ?>
                <div class="tarjeta-perfil">
                    <img src="<?php echo $alumno['foto']; ?>" alt="Foto de <?php echo $alumno['nombre']; ?>">
                    <div class="info">
                        <h3><?php echo $alumno['nombre']; ?></h3>
                        <p><strong>Biografia:</strong> <?php echo $alumno['bio']; ?></p>
                        <p class="habilidades"><strong>Habilidades:</strong> <?php echo $alumno['habilidades']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <hr>

        <div class="formulario">
            <h2>Formulario para reportar una falla</h2>

            <form method="post" action="procesar.php">
                <div class="campo">
                    <label for="usuario">Nombre de Usuario: </label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="campo">
                    <label for="falla">Descripcion de la Falla: </label>
                    <textarea id="falla" name="falla" required></textarea> 
                </div>
                <div>
                    <button type="submit" class="boton-enviar"><strong>Reportar Falla</strong></button>
                </div>

            </form>
        </div>

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

                <?php $n = 1; ?>
                <?php foreach ($tickets as $ticket):?>

                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><?php echo $ticket['usuario']; ?></td>
                    <td><?php echo $ticket['descripcion_falla']; ?></td>
                    <td><?php echo $ticket['fecha_reporte']; ?></td>
                    <td>
                        <?php echo $ticket['resuelto'] ? 'Resuelto': 'Pendiente'; ?>
                    </td>
                    <td>
                        <div class="boton_2">
                            <a href="cambiar_estado.php?id=<?php echo $ticket['id']; ?>&estado=<?php echo $ticket['resuelto']; ?>" class="boton"><strong>Cambiar Estado</strong></a>
                            <a href="editar.php?id=<?php echo $ticket['id']; ?>" class="boton"><strong>Editar</strong></a>
                            <a href="eliminar.php?id=<?php echo $ticket['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este ticket?')" class="boton"><strong>Eliminar</strong></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr>
        <h2>Reporte de Python</h2>
        <div id="reporte-python">
            <?php
            $archivo = 'shared/reporte.txt';
            if (file_exists($archivo)){
                echo "<pre><strong>". file_get_contents($archivo) ."</strong></pre>";
            }
            else{
                echo "El reporte aun no se ha cargado";
            }
            ?>
        </div>
    </body>
</html>
