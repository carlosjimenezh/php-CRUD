<?php 

session_start();
//iniciar una sesión para utilizar $_SESSION 

$conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'lista_tareas'
);

// if (isset( $conexion )) {
//     echo '<h1>Concexion realizada</h1>';
// } valida si la conexion ha sido establecida

?>