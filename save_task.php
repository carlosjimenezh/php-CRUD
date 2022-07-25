
<?php 

include ('conexion_db.php'); 
// instanciamos la variable de conexion de la base de datos

if ( isset($_POST['save_task'] ) ) {
    // válida si se encuentra un submit con el nombre 'save_task'
    $titulo = $_POST['nombre_tarea'];
    $descripcion = $_POST['descripcion_tarea'];

    $query = "INSERT INTO tareas (nombre_tarea, descripcion_tarea) VALUES ('$titulo', '$descripcion')";
    // creación de consulta sql
    // Es importante que lleve comillas dobles ""


    $result = mysqli_query($conexion, $query);
    //capturar query con mysqli_query con la conexión y la consulta

    if (!$result) {
        die ('Falló la consulta');
    // si falla la consulta imprime falló la consulta
    }

    $_SESSION['mensaje'] = 'Se ha guardado tu tarea';
    //crear una variable en sesión con un mensaje

    // echo 'Guardado';
    header('location:index.php');
    // header location redirecciona o actualiza la página
    
}
?>