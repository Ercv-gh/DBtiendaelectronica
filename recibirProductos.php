<?php
include("variablescomputacion.php");

$nombre = $_REQUEST['fnom'];
$descripcion = $_REQUEST['fdescripcio'];
$precio = $_REQUEST['fpreu'];
$cantidad = $_REQUEST['fquantitat'];
$categoria= $_REQUEST['fcategoria'];
$marca= $_REQUEST['fmarca'];
$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $bd);
echo "<p>Conexión satisfactoria</p>";

$sql = "INSERT INTO productos (nom, categoria, marca, descripcio, preu, quantitat) values ('$nombre', '$categoria', '$marca', '$descripcion', '$precio', '$cantidad')";
echo $sql;

$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Producto guardado correctamente";
} else {
    echo "Error:" . mysqli_error($conexion);
}

mysqli_close($conexion);
