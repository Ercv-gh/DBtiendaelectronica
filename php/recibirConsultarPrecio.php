<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir Consulta Precio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php
    mysqli_report(MYSQLI_REPORT_OFF);

    /** @var mysqli $conexion */
    include("../db/conne.php");

    $id = filter_input(INPUT_POST, 'fid', FILTER_VALIDATE_INT);

    if ($id === null || $id === false || $id <= 0) {
        http_response_code(422);
        exit("<p>Código de producto no válido.</p>");
    }
    $stmt = mysqli_prepare($conexion, "SELECT * FROM productos WHERE codi = ?");
    if (!$stmt || !mysqli_stmt_bind_param($stmt, "i", $id) || !mysqli_stmt_execute($stmt)) {
        http_response_code(500);
        exit("<p>No se ha podido consultar el producto.</p>");
    }
    $registro = mysqli_stmt_get_result($stmt);

    echo "<main>";

    if ($reg = mysqli_fetch_array($registro)) {
        echo "<div class='resultadoPrecio'>";
        echo "<h2>🔍 Producto encontrado</h2>";
        echo "<form action='editarProducto.php' method='post'>";

        echo "<input
        type='hidden'
        name='fcodi'
        value='" . htmlspecialchars((string)$reg['codi'], ENT_QUOTES, 'UTF-8') . "'>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Nombre</label>";

        echo "<input
            id='nom'
            type='text'
            name='fnom'
            value='" . htmlspecialchars((string)$reg['nom'], ENT_QUOTES, 'UTF-8') . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Categoría</label>";

        echo "<input
            id='categoria'
            type='text'
            name='fcategoria'
            value='" . htmlspecialchars((string)$reg['categoria'], ENT_QUOTES, 'UTF-8') . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Marca</label>";

        echo "<input
            id='marca'
            type='text'
            name='fmarca'
            value='" . htmlspecialchars((string)$reg['marca'], ENT_QUOTES, 'UTF-8') . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Precio (€)</label>";

        echo "<input
            id='precio'
            type='number'
            step='0.01'
            name='fpreu'
            value='" . htmlspecialchars((string)$reg['preu'], ENT_QUOTES, 'UTF-8') . "'
            readonly>";

        echo "</div>";

        echo "<input
        type='button'
        id='btnEditar'
        value='✏️ Editar producto'
        onclick='activarEdicion()'>";

        echo "<input
        type='submit'
        id='btnGuardar'
        value='💾 Guardar cambios'
        style='display:none'>";

        echo "</form>";
        echo "</div>";
    } else {
        echo "<div class='contenedor'>";
        echo "<div class='card'>";
        echo "<h2>❌ Producto no encontrado</h2>";
        echo "<p>No existe ningún producto con ese código.</p>";
        echo "</div>";
        echo "</div>";
    }
    include("../includes/botones.php");

    echo "</main>";
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    ?>



    <script>
        function activarEdicion() {
            document.getElementById("nom").readOnly = false;
            document.getElementById("categoria").readOnly = false;
            document.getElementById("marca").readOnly = false;
            document.getElementById("precio").readOnly = false;
            document.getElementById("btnEditar").style.display = "none";
            document.getElementById("btnGuardar").style.display = "block";
            document.getElementById("nom").focus();
        }
    </script>
</body>

</html>