<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Precio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    /** @var mysqli $conexion */
    include("../db/conne.php");

    $codi = filter_input(INPUT_POST, 'fcodi', FILTER_VALIDATE_INT);
    if ($codi === null || $codi === false || $codi <= 0) {
        http_response_code(422);
        exit("<p>Código de producto no válido.</p>");
    }
    $stmt = mysqli_prepare($conexion, "SELECT * FROM productos WHERE codi = ?");
    if (!$stmt || !mysqli_stmt_bind_param($stmt, "i", $codi) || !mysqli_stmt_execute($stmt)) {
        http_response_code(500);
        exit("<p>No se ha podido consultar el producto.</p>");
    }
    $registro = mysqli_stmt_get_result($stmt);

    echo "<main>";
    if ($reg = mysqli_fetch_array($registro)) {
        echo "<form action='guardarPrecio.php' method='post'>";
        echo "<div class='tituloFormulario'>";
        echo "<h2>💰 Actualizar Precio</h2>";
        echo "<p>Producto encontrado</p>";
        echo "</div>";

        echo "<input
                type='hidden'
                name='fcodi'
                value='" . htmlspecialchars((string)$reg['codi'], ENT_QUOTES, 'UTF-8') . "'>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Nombre</label>";
        echo "<input
                    type='text'
                    value='" . htmlspecialchars((string)$reg['nom'], ENT_QUOTES, 'UTF-8') . "'
                    readonly>";
        echo "</div>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Categoría</label>";
        echo "<input
                    type='text'
                    value='" . htmlspecialchars((string)$reg['categoria'], ENT_QUOTES, 'UTF-8') . "'
                    readonly>";
        echo "</div>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Precio actual (€)</label>";
        echo "<input
                    type='number'
                    name='fpreu'
                    step='0.01'
                    value='" . htmlspecialchars((string)$reg['preu'], ENT_QUOTES, 'UTF-8') . "'
                    required>";
        echo "</div>";

        echo "<input
                type='submit'
                value='💾 Guardar cambios'>";
        echo "</form>";
    } else {
        echo "<div class='mensajeResultado error'>";
        echo "<h2>❌ Producto no encontrado</h2>";
        echo "<p>No existe ningún producto con ese código.</p>";
        echo "</div>";
    }
    include("../includes/botones.php");

    echo "</main>";

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    ?>

</body>

</html>