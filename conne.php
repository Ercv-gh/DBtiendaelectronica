<?php

mysqli_report(MYSQLI_REPORT_OFF);
// MYSQLI_REPORT_OFF: desactiva los mensajes automáticos de error
// Así los errores no aparecen directamente en pantalla y podemos controlarlos nosotros.

include("variablesComputacion.php");
// Importamos las variables: $servidor, $usuario, $contrasenha, $bd

try{

    $conexion = mysqli_connect(
        $servidor,
        $usuario,
        $contrasenha,
        $bd
    );

    // Si la conexión falla, mysqli_connect devuelve false
    if(!$conexion){

        echo "<p>Error al conectar con la base de datos</p>";

    }else{

        echo "<p>¡Conexión satisfactoria!</p>";

        // Cerramos la conexión cuando ya no la necesitamos
        mysqli_close($conexion);

    }

}catch(mysqli_sql_exception $error){

    // El catch captura excepciones (errores graves)
    echo "<p>Problemas en la conexión</p>";

    // getMessage() devuelve el mensaje del error
    echo $error->getMessage();

    // En PHP: objeto->metodo(); // En JavaScript sería:objeto.metodo() // En PHP NO usamos el punto porque: el punto se utiliza para concatenar cadenas
}

?>