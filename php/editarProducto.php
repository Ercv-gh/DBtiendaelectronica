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
    $codi = filter_input(INPUT_POST, 'fcodi', FILTER_VALIDATE_INT);
    $nom = trim($_POST['fnom'] ?? '');
    $categoria = trim($_POST['fcategoria'] ?? '');
    $marca = trim($_POST['fmarca'] ?? '');
    $preu = filter_input(INPUT_POST, 'fpreu', FILTER_VALIDATE_FLOAT);
    if (!$codi || $nom === '' || $categoria === '' || $marca === '' || $preu === false || $preu === null || $preu < 0) {
        http_response_code(422);
        exit("<p>Datos no válidos.</p>");
    }
    $stmt = mysqli_prepare($conexion, "UPDATE productos SET nom = ?, categoria = ?, marca = ?, preu = ? WHERE codi = ?");
    $resultado = $stmt && mysqli_stmt_bind_param($stmt, "sssdi", $nom, $categoria, $marca, $preu, $codi) && mysqli_stmt_execute($stmt);

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

    if ($stmt) mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    ?>

</body>

</html>