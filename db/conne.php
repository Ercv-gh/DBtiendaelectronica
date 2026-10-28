<?php
require_once __DIR__ . "/variablesComputacion.php";
mysqli_report(MYSQLI_REPORT_OFF);
$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $bd);
if (!$conexion) {
    http_response_code(500);
    error_log("Error de conexión con la base de datos.");
    exit("<p>No se ha podido conectar con la base de datos.</p>");
}
mysqli_set_charset($conexion, "utf8mb4");
