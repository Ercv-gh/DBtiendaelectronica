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
    // mysqli_report(MYSQLI_REPORT_OFF);
    //  /** @var mysqli $conexion*/
    // //conectarse a la red
    // include ("../db/conne.php");

    // //1. Recoger los datos del form
    // $id= $_POST['fid'];

    // //2. Defino la variable y hago el select
    // $consulta= "SELECT * FROM productos WHERE codi= '$id'";

    // //3. Ejecuto la consulta
    // $registro= mysqli_query($conexion, $consulta) or die("<p>Problemas con el select");
    // if($reg=mysqli_fetch_array($registro)){
    //      echo "<p> Nombre:$reg[nom]</p>";
    //     echo "<p> Precio:$reg[preu] €</p>";
    // }else {
    // // echo "<p>No exite ese producto</p>";
    // }

    // 
    ?>

    <?php
    mysqli_report(MYSQLI_REPORT_OFF);

    /** @var mysqli $conexion */
    include("../db/conne.php");

    $id = $_POST['fid'];

    $consulta = "SELECT * FROM productos WHERE codi='$id'";

    $registro = mysqli_query($conexion, $consulta)
        or die("<p>Problemas con el select</p>");

    echo "<main>";

    if ($reg = mysqli_fetch_array($registro)) {
        echo "<div class='resultadoPrecio'>";
        echo "<h2>🔍 Producto encontrado</h2>";
        echo "<form action='editarProducto.php' method='post'>";

        echo "<input
        type='hidden'
        name='fcodi'
        value='" . $reg['codi'] . "'>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Nombre</label>";

        echo "<input
            id='nom'
            type='text'
            name='fnom'
            value='" . $reg['nom'] . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Categoría</label>";

        echo "<input
            id='categoria'
            type='text'
            name='fcategoria'
            value='" . $reg['categoria'] . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Marca</label>";

        echo "<input
            id='marca'
            type='text'
            name='fmarca'
            value='" . $reg['marca'] . "'
            readonly>";

        echo "</div>";

        echo "<div class='grupoFormulario'>";

        echo "<label>Precio (€)</label>";

        echo "<input
            id='precio'
            type='number'
            step='0.01'
            name='fpreu'
            value='" . $reg['preu'] . "'
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