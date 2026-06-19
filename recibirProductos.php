<?php

include("variablesComputacion.php");

mysqli_report(MYSQLI_REPORT_OFF);

$nombre      = $_REQUEST['fnom'];
$descripcion = $_REQUEST['fdescripcio'];
$precio      = $_REQUEST['fpreu'];
$cantidad    = $_REQUEST['fquantitat'];
$categoria   = $_REQUEST['fcategoria'];
$marca       = $_REQUEST['fmarca'];

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $contrasenha,
    $bd
);

if(!$conexion){

    die("Error de conexión con la base de datos");

}

echo "<p>Conexión satisfactoria</p>";

$sql = "INSERT INTO productos
(
    nom,
    categoria,
    marca,
    descripcio,
    preu,
    quantitat
)
VALUES
(
    '$nombre',
    '$categoria',
    '$marca',
    '$descripcion',
    '$precio',
    '$cantidad'
)";

$resultado = mysqli_query($conexion,$sql);

if($resultado){

    echo "<h2>Producto guardado correctamente</h2>";

}else{

    echo "<h2>Error al guardar el producto</h2>";
    echo mysqli_error($conexion);

}

mysqli_close($conexion);

?>