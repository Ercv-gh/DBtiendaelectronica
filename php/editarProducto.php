<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    /** @var mysqli $conexion */

    include("../db/conne.php");
    $codi = $_POST['fcodi'];
    $nom = $_POST['fnom'];
    $categoria = $_POST['fcategoria'];
    $marca = $_POST['fmarca'];
    $preu = $_POST['fpreu'];
    $consulta = "UPDATE productos SET nom='$nom',categoria='$categoria',marca='$marca',
    preu='$preu' WHERE codi='$codi'";

    $resultado = mysqli_query($conexion, $consulta);

    echo "<main>";

    echo "<div class='contenedor'>";
    if ($resultado) {
        echo "<div class='mensajeResultado exito'>";
        echo "<h2>✅ Producto actualizado correctamente</h2>";
        echo "<p>Los cambios se han guardado en la base de datos.</p>";
        echo "<a href='../index2.html'
                 class='botonVolver'>
                 Volver al inicio
              </a>";
        echo "</div>";
    } else {
        echo "<div class='mensajeResultado error'>";
        echo "<h2>❌ Error al actualizar</h2>";
        echo "<p>No se han podido guardar los cambios.</p>";
        echo "</div>";
    }

    echo "</div>";
   include("../includes/botones.php");

    echo "</main>";

    mysqli_close($conexion);

    ?>

</body>

</html>