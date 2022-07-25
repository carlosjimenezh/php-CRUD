<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MY SQL CRUD</title>
</head>
<body>
    
    <?php include('conexion_db.php'); ?>

    <h1>LISTA DE TAREAS</h1>


    <?php if(isset($_SESSION['mensaje'])) { ?> 
        <script>alert('<?php echo $_SESSION['mensaje']; ?>');</script>
    <?php session_unset(); } ?>
    <!-- session_unset resetea las variables de session para que no se repitan al refrescar     -->

    <main>

        <form action="save_task.php" method="POST" style="width:50%; float:left">
            <div class="form-gruop">
                <label for="nombre_tarea">Nombre tarea</label> <br>
                <input type="text" name="nombre_tarea" id='nombre_tarea' placeholder="Tarea">
            </div>
            <div class="form-group">
                <label for="descripcion_tarea">Descripcion</label> <br>
                <textarea name="descripcion_tarea" id="descripcion_tarea" cols="30" rows="10" placeholder="descripcion">
                </textarea>
            </div>
            <input name='save_task' type="submit" value="Guardar">
        </form>


        <table style="width: 50%">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = 'SELECT * FROM tareas';
                    $resultado = mysqli_query($conexion, $query);
                    while ($row = mysqli_fetch_array($resultado) ) { ?>
                        <tr>
                            <td> 
                                <?php echo $row['nombre_tarea']; ?> 
                            </td>
                            <td>
                                <?php echo $row['descripcion_tarea']; ?>
                            </td>
                            <td>
                                <?php echo $row['tiempo_creacion']; ?>
                            </td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']; ?>">
                                    Editar
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']; ?>">
                                    Borrar
                                </a>
                                <!-- echo $row['id'] guarda el id de la tarea por cada tarea -->
                            </td>
                        </tr>
                <?php } ?>
                <!-- mientras alla resultado en mysqli_fetch_array  de resultados va imprimir 'nombre_tarea' -->
            </tbody>
        </table>

    </main>
</body>
</html>