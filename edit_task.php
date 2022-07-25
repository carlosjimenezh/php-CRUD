<?php 
    include('conexion_db.php');

    if( isset($_GET['id']) ) { 
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id = $id"; 
        $resultado = mysqli_query($conexion, $query);
        while ( $row = mysqli_fetch_array($resultado) ){
            ?>
            <form action="" method="POST" style="width:50%; margin: 50px auto">
            <div class="form-gruop">
                <label for="nombre_tarea">Nombre tarea</label> <br>
                <input type="text" name="nombre_tarea" id='nombre_tarea' 
                placeholder="Tarea" value="<?php echo $row['nombre_tarea']; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion_tarea">Descripcion</label> <br>
                <textarea name="descripcion_tarea" id="descripcion_tarea" 
                cols="30" rows="10" 
                placeholder="descripcion">
                    <?php echo $row['descripcion_tarea']; ?>
                </textarea>
            </div>
            <input name='edit_task' type="submit" value="Editar">
        </form>
<?php   
        if ( isset($_POST['edit_task']) ) {
            $nombre = $_POST['nombre_tarea'];
            $descripcion = $_POST['descripcion_tarea'];
            $query = "UPDATE tareas SET nombre_tarea = '$nombre', descripcion_tarea = '$descripcion' WHERE id = $id";
            $resultado = mysqli_query($conexion, $query);
            $_SESSION['mensaje'] = 'Se ha actualizado la tarea';
            header('location:index.php');
        }
        }
    } 
?> 