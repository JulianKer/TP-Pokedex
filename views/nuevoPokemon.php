<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header("location: /TP-Pokedex/index.php");
    exit();
}


require_once ("../database/Database.php");
$bdd = new Database();
$msjError = isset($_GET["msj"]) ? $_GET["msj"] : "";

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TP-Pokedex/styles/nuevoPokemon.css">
    <script src="/TP-Pokedex/js/pupupGuardarCambiosPokemon.js" defer></script>

    <link rel="icon" href="/TP-Pokedex/assets/icons/pokemon-logo.svg">
    <title>Nuevo Pokemon | Pokedex</title>
</head>
<body>
<?php require_once("header.php")?>

<main>

    <section class="fondo-popup">
        <section class="pop-up">
            <img src="/TP-Pokedex/assets/icons/icon_warning.svg" alt="Ciudado" class="pop-up-check">
            <p class="pop-up-mensaje" style="text-align: center">¿Seguro desea guardar los cambios?</p>
            <div>
                <a href="" class="btn_cancelar">Cancelar</a>
                <a href="#" class="btn_aceptar">Aceptar</a>
            </div>
        </section>
    </section>
    <?php
    if ($msjError != "") {
        echo '<div class="alert alert-danger" style="display: flex; justify-content: center; align-items: center; gap: 1em; text-align: center"> <img src="/TP-Pokedex/assets/icons/icon_error.svg" alt="error">' . $msjError . '</div>';
    }
    ?>
    <h1>Nuevo pokemon</h1>
    <form method="post" action="../controller/controllerNuevoPokemon.php" enctype="multipart/form-data" id="formulario">
        <section class="contenedor_inputs">

            <div>
                <label for="new_nombre">Nombre</label>
                <input type="text" name="new_nombre" placeholder="Nombre" id="new_nombre" class="form-control" >
            </div>

            <div>
                <label for="new_descripcion">Descripción</label>
                <textarea maxlength="100" placeholder="Describe a tu pokemon" name="new_descripcion" id="new_descripcion" class="form-control" ></textarea>
            </div>

            <div>
                <label for="new_id_unico">N° Identificador (mayor o igual a 500)</label>
                <input type="number" min="500" required name="new_id_unico" id="new_id_unico" placeholder="N° Identificador (mayor a 500)" class="form-control" >
            </div>

            <div>
                <label for="new_tipo">Seleccione el tipo</label>
                <select name="new_tipo" id="new_tipo" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="1">Agua</option>
                    <option value="2">Fuego</option>
                    <option value="3">Planta</option>
                    <option value="4">Eléctrico</option>
                </select>
            </div>

            <div>
                <label for="new_img">Seleccione la imagen (.png/.jpg/.webp/.avif)</label>
                <input type="file" name="new_img" id="new_img" class="form-control">
            </div>
        </section>

        <div class="cont_botones">
            <a href="/TP-Pokedex/index.php" class="btn_eliminar"> <img src="/TP-Pokedex/assets/icons/icon_delete.svg">Volver</a>
            <input type="submit" class="btn_editar" value="Guardar">
        </div>
    </form>
</main>

<?php require_once("footer.php")?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>