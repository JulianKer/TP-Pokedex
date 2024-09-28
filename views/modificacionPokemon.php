<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header("location: /TP-Pokedex/index.php");
    exit();
}


require_once ("../database/Database.php");
$bdd = new Database();
$idRecibido = isset($_GET["id_pokemon"]) ? $_GET["id_pokemon"] : "";
$msjError = isset($_GET["msj"]) ? $_GET["msj"] : "";
$pokemonEncontrado = $bdd->buscarPokemonPorId($idRecibido);

/*echo json_encode($pokemonEncontrado);*/
if ($idRecibido == "" || $pokemonEncontrado == null) {
    header("location: /TP-Pokedex/index.php");
    exit();
    //esto lo hago para que no puedan acceder a la vista de editar el pokemon por la url, aunque si le ponen
    // un id_pokemon=X acceden igual.
}

$tipoSeleccionado =  $pokemonEncontrado[0]["nombre_tipo"];

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TP-Pokedex/styles/modificacionPokemon.css">
    <script src="/TP-Pokedex/js/pupupGuardarCambiosPokemon.js" defer></script>

    <link rel="icon" href="/TP-Pokedex/assets/icons/pokemon-logo.svg">
    <title> | Pokedex</title>
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
        <h1>Modificar pokemon</h1>
        <form method="post" action="../controller/controllerModificacionPokemon.php" enctype="multipart/form-data" id="formulario">
            <div class="contenedor_img_pokemon">
                <img src="<?php echo $pokemonEncontrado[0]["imagen"]?>" alt="img_pokemon">
            </div>

            <section class="contenedor_inputs">

            <div>
                <label for="modif_nombre">Nombre</label>
                <input type="text" name="modif_nombre" placeholder="Nombre" id="modif_nombre" class="form-control" value="<?php echo $pokemonEncontrado[0]["nombre"]?>">
            </div>

            <div>
                <label for="modif_descripcion">Descripción</label>
                <textarea maxlength="100" placeholder="Describe a tu pokemon" name="modif_descripcion" id="modif_descripcion" class="form-control" ><?php echo $pokemonEncontrado[0]["descripcion"]?></textarea>
            </div>

            <div>
                <label for="modif_id_unico">N° Identificador (mayor o igual a 500)</label>
                <input type="number" min="500" required name="modif_id_unico" id="modif_id_unico" placeholder="N° Identificador (mayor a 500)" class="form-control" value="<?php echo $pokemonEncontrado[0]["numero_identificador"]?>">
            </div>

            <div>
                <label for="modif_tipo">Seleccione el tipo</label>
                <select name="modif_tipo" id="modif_tipo" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="1" <?php echo $tipoSeleccionado == "Agua" ? "selected" : ""?>>Agua</option>
                    <option value="2" <?php echo $tipoSeleccionado == "Fuego" ? "selected" : ""?>>Fuego</option>
                    <option value="3" <?php echo $tipoSeleccionado == "Planta" ? "selected" : ""?>>Planta</option>
                    <option value="4" <?php echo $tipoSeleccionado == "Electrico" ? "selected" : ""?>>Eléctrico</option>
                </select>
            </div>

            <div>
                <label for="modif_img">Seleccione la imagen (.png/.jpg/.webp/.avif)</label>
                <input type="file" name="modif_img" id="modif_img" class="form-control">
            </div>
                <input type="hidden" value="<?php echo $pokemonEncontrado[0]["id_pokemon"]?>" name="hidden">
            </section>

            <div class="cont_botones">

                <a href="/TP-Pokedex/index.php" class="btn_eliminar"> <img src="/TP-Pokedex/assets/icons/icon_delete.svg">Volver</a>
                <input type="submit" class="btn_editar" value="Guardar"> <!--<img src="/TP-Pokedex/assets/icons/icon_save.svg">Guardar-->
            </div>
        </form>
















    </main>


<?php require_once("footer.php")?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>