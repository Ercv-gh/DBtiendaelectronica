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

    $codi = filter_input(INPUT_POST, 'fcodi', FILTER_VALIDATE_INT);
    $preu = filter_input(INPUT_POST, 'fpreu', FILTER_VALIDATE_FLOAT);
    if (!$codi || $preu === false || $preu === null || $preu < 0) {
        http_response_code(422);
        exit("<p>Datos no válidos.</p>");
    }
    $stmt = mysqli_prepare($conexion, "UPDATE productos SET preu = ? WHERE codi = ?");
    $resultado = $stmt && mysqli_stmt_bind_param($stmt, "di", $preu, $codi) && mysqli_stmt_execute($stmt);
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

    if ($stmt) mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    ?>

</body>

</html>