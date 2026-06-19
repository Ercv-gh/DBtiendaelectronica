<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/nav.php"); ?>
    <main>

        <form id="formularioRegistro" action="#" method="post">
            <div class="tituloFormulario">
                <h1>🖥️ Registro de Producto</h1>
                <p>Añade nuevos productos al catálogo de ElectroStore</p>
            </div>

            <div class="grupoFormulario">
                <label for="nom">Nombre del producto</label>
                <input type="text" id="nom" name="fnom" placeholder="Ej: Monitor LG UltraGear" required>
            </div>

            <div class="fila">
                <div class="grupoFormulario">
                    <label for="categoria">Categoría</label>

                    <select id="categoria" name="fcategoria" required>

                        <option>Selecciona una categoría</option>
                        <option>Pantalla</option>
                        <option>Portátil</option>
                        <option>Teclado</option>
                        <option>Ratón</option>
                        <option>Impresora</option>

                    </select>

                </div>

                <div class="grupoFormulario">
                    <label for="marca">Marca</label>

                    <input type="text" id="marca" name="fmarca" placeholder="Ej: LG">
                </div>

            </div>

            <div class="grupoFormulario">

                <label for="descripcio">Descripción</label>

                <textarea id="descripcio" name="fdescripcio" placeholder="Describe las características principales del producto..."></textarea>

            </div>

            <div class="fila">

                <div class="grupoFormulario">
                    <label for="preu">Precio (€)</label>

                    <input type="number" id="preu" name="fpreu" min="0" step="0.01">
                </div>

                <div class="grupoFormulario">
                    <label for="quantitat">Cantidad</label>

                    <input type="number" id="quantitat" name="fquantitat" min="0">
                </div>

            </div>

            <button type="submit">💾 Registrar Producto</button>

        </form>

    </main>
<?php include("includes/footer.php");?>
</body>

</html>