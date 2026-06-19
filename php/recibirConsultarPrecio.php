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

// ?>

<?php
mysqli_report(MYSQLI_REPORT_OFF);

/** @var mysqli $conexion */
include("../db/conne.php");

$id = $_POST['fid'];

$consulta = "SELECT * FROM productos WHERE codi='$id'";

$registro = mysqli_query($conexion, $consulta)
or die("<p>Problemas con el select</p>");

echo "<main>";

if($reg = mysqli_fetch_array($registro)){
echo "<div class='resultadoPrecio'>";
        echo "<h2>🔍 Producto encontrado</h2>";
        echo "<div class='card'>";
            echo "<h3>".$reg['nom']."</h3>";
            echo "<p><strong>Código:</strong> ".$reg['codi']."</p>";
            echo "<p><strong>Categoría:</strong> ".$reg['categoria']."</p>";
            echo "<p><strong>Marca:</strong> ".$reg['marca']."</p>";
            echo "<p><strong>Precio:</strong> ".$reg['preu']." €</p>";
        echo "</div>";
    echo "</div>";
}
else{
    echo "<div class='contenedor'>";
        echo "<div class='card'>";
            echo "<h2>❌ Producto no encontrado</h2>";
            echo "<p>No existe ningún producto con ese código.</p>";
        echo "</div>";
    echo "</div>";
}
echo "</main>";
mysqli_close($conexion);
?>