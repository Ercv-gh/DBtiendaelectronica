<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar producto</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
<?php
require_once "../db/conne.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "<p>Método no permitido.</p>";
} else {
    $nombre = trim($_POST['fnom'] ?? '');
    $categoria = trim($_POST['fcategoria'] ?? '');
    $marca = trim($_POST['fmarca'] ?? '');
    $descripcion = trim($_POST['fdescripcio'] ?? '');
    $precio = filter_var($_POST['fpreu'] ?? null, FILTER_VALIDATE_FLOAT);
    $cantidad = filter_var($_POST['fquantitat'] ?? null, FILTER_VALIDATE_INT);
    if ($nombre === '' || $categoria === '' || $marca === '' || $precio === false ||
        $cantidad === false || $precio < 0 || $cantidad < 0) {
        http_response_code(422);
        echo "<p>Comprueba los datos del formulario.</p>";
    } else {
        $stmt = mysqli_prepare($conexion, "INSERT INTO productos (nom, descripcio, preu, quantitat, categoria, marca) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt && mysqli_stmt_bind_param($stmt, "ssdiss", $nombre, $descripcion, $precio, $cantidad, $categoria, $marca) && mysqli_stmt_execute($stmt)) {
            echo "<p>Producto insertado correctamente.</p>";
        } else {
            http_response_code(500);
            error_log('Error al registrar producto: ' . mysqli_error($conexion));
            echo "<p>No se ha podido registrar el producto.</p>";
        }
        if ($stmt) mysqli_stmt_close($stmt);
    }
}
mysqli_close($conexion);
include "../includes/botones.php";
?>
</main>
</body>
</html>
