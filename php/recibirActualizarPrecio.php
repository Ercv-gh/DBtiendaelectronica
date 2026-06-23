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

    $codi = $_POST['fcodi'];
    $consulta = "SELECT * FROM productos WHERE codi='$codi'";
    $registro = mysqli_query($conexion, $consulta);

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
                value='" . $reg['codi'] . "'>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Nombre</label>";
        echo "<input
                    type='text'
                    value='" . $reg['nom'] . "'
                    readonly>";
        echo "</div>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Categoría</label>";
        echo "<input
                    type='text'
                    value='" . $reg['categoria'] . "'
                    readonly>";
        echo "</div>";

        echo "<div class='grupoFormulario'>";
        echo "<label>Precio actual (€)</label>";
        echo "<input
                    type='number'
                    name='fpreu'
                    step='0.01'
                    value='" . $reg['preu'] . "'
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

    mysqli_close($conexion);
    ?>

</body>

</html>