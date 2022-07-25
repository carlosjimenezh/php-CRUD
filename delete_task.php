<?php
    include('conexion_db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tareas WHERE id = $id";
        // Es importante que lleve comillas dobles ""
        $resultado = mysqli_query($conexion, $query);
        if ( !$resultado ) {
            die ('Falló la consulta');
        }
        $_SESSION['mensaje'] = 'Se ha eliminado la tarea';
        header('location:index.php');
    }
?>