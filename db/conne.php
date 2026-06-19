<?php

mysqli_report(MYSQLI_REPORT_OFF);
// MYSQLI_REPORT_OFF: desactiva los mensajes automáticos de MySQL.
// Así controlamos nosotros los errores.

include("variablesComputacion.php");
// Contiene:
// $servidor
// $usuario
// $contrasenha
// $bd

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $contrasenha,
    $bd
);

// Comprobamos si la conexión ha fallado
if(!$conexion){

    die("<p>Error de conexión con la base de datos.</p>");

}

// No mostrar mensajes de éxito aquí.
// No cerrar la conexión aquí.
// La conexión queda disponible para el archivo que haga el include.

?>