
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TP-Pokedex/styles/modificacionPokemon.css">
    <script src="/TP-Pokedex/js/popupEliminarPokemon.js" defer></script>

    <link rel="icon" href="/TP-Pokedex/assets/icons/pokemon-logo.svg">
    <title> | Pokedex</title>
</head>
<body>
<?php require_once("header.php")?>


    <main>

    <!--<section class="fondo-popup">
        <section class="pop-up">
            <img src="/TP-Pokedex/assets/icons/icon_warning.svg" alt="Ciudado" class="pop-up-check">
            <p class="pop-up-mensaje">¿Seguro desea eliminar?</p>
            <div>
                <a href="/TP-Pokedex/index.php" class="btn_cancelar">Cancelar</a>
                <a href="#" class="btn_aceptar">Aceptar</a>
            </div>
        </section>
    </section>-->

        <h1>Modificar pokemon</h1>
        <form>
            <div class="contenedor_img_pokemon">
                <img src="/TP-Pokedex/assets/pokemones/pikachu.webp" alt="img_pokemon">
            </div>

            <section class="contenedor_inputs">

            <div>
                <label for="modif_nombre">Nombre</label>
                <input type="text" name="modif_nombre" placeholder="Nombre" id="modif_nombre" class="form-control">
            </div>

            <div>
                <label for="modif_descripcion">Descripción</label>
                <textarea maxlength="100" placeholder="Describe a tu pokemon" name="modif_descripcion" id="modif_descripcion" class="form-control"></textarea>
            </div>

            <div>
                <label for="modif_id_unico">ID único</label>
                <input type="number" min="500" name="modif_id_unico" id="modif_id_unico" placeholder="Id único (mayor a 500)" class="form-control">
            </div>

            <div>
                <label for="modif_tipo">Seleccione el tipo</label>
                <select name="modif_tipo" id="modif_tipo" class="form-control">
                    <option value="seleccionar" selected>Seleccionar</option>
                    <option value="1">Agua</option>
                    <option value="2">Fuego</option>
                    <option value="3">Planta</option>
                    <option value="4">Eléctrico</option>
                </select>
            </div>

            <div>
                <label for="modif_img">Seleccione la imagen (.png/.jpg/.webp/.avif)</label>
                <input type="file" name="modif_img" id="modif_img" class="form-control">
            </div>

            </section>

            <div class="cont_botones">
                <a href="/TP-Pokedex/index.php" class="btn_eliminar"> <img src="/TP-Pokedex/assets/icons/icon_delete.svg">Volver</a>
                <a href="/TP-Pokedex/controller/controllerModificacionPokemon.php" class="btn_editar"> <img src="/TP-Pokedex/assets/icons/icon_save.svg">Guardar</a>
            </div>
        </form>
















    </main>


<?php require_once("footer.php")?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>