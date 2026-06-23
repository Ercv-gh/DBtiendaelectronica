<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Guardar Precio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    /** @var mysqli $conexion */
    include("../db/conne.php");

    $codi = $_POST['fcodi'];
    $preu = $_POST['fpreu'];
    $consulta = " UPDATE productos SET preu='$preu' WHERE codi='$codi'";

    $resultado = mysqli_query($conexion, $consulta);
    echo "<main>";
    echo "<div class='contenedor'>";
    if ($resultado) {
        echo "<div class='mensajeResultado exito'>";
        echo "<h2>✅ Precio actualizado correctamente</h2>";
        echo "<p>El nuevo precio se ha guardado correctamente.</p>";
        echo "<a
                href='../index2.html'
                class='botonVolver'>
                Volver al inicio
              </a>";
        echo "</div>";
    } else {
        echo "<div class='mensajeResultado error'>";
        echo "<h2>❌ Error al actualizar</h2>";
        echo "<p>No se ha podido actualizar el precio.</p>";
        echo "</div>";
    }
    echo "</div>";
    include("../includes/botones.php");
    echo "</main>";

    mysqli_close($conexion);
    ?>

</body>

</html>