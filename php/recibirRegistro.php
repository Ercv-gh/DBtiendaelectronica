<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir Registro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
 /** @var mysqli $conexion*/
include ("../db/conne.php");
//1. Recoger los datos del formulario
$nombreProducto= $_REQUEST['fnom'];
$categoria= $_REQUEST['fcategoria'];
$marca= $_REQUEST['fmarca'];
$descripcion= $_REQUEST['fdescripcio'];
$precio= $_REQUEST['fpreu'];
$cantidad= $_REQUEST['fquantitat'];


//2. Inserto los datos y defino la variable donde las recojo
$registro= "INSERT INTO productos (nom, descripcio, preu, quantitat, categoria, marca) VALUES ('$nombreProducto', '$descripcion', '$precio', '$cantidad', '$categoria', '$marca')";
echo $registro;

try{

//3. Ejecuto la consulta
mysqli_query($conexion, $registro);
    if(mysqli_query($conexion, $registro)){
        echo "Producto insertado correctamente";
    }else{
        echo "Error al insertar";
    }

mysqli_close($conexion);
}
catch(mysqli_sql_exception $error){
    echo "<p>Problemas con la conexión</p>";
    echo $error->getMessage();
}

?>
</body>
</html>