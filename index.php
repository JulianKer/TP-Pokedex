<?php
session_start();
$estaLogeado = false;

if (isset($_SESSION['usuario'])){
    $estaLogeado = true;
}
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TP-Pokedex/styles/home.css">
    <title>Inicio | Pokedex</title>
</head>
<body>
    <?php require_once("views/header.php")?>


    <main>
        <form class="form_buscador">
            <input type="search" placeholder="Ingrese el nombre, tipo o número de pokemon">
            <input type="submit" value="Buscar" class="btn">
        </form>


        <section class="contenedor_pokemones">
            <div class="pokemon">
                <a href="#" class="cont_1">
                    <img src="/TP-Pokedex/assets/pokemones/Bellossom.webp" alt="img_pokemon">
                </a>
                <div class="cont_2">
                    <a href="#" class="descripcion">
                        <p class="numero_pokemon">1</p>
                        <p class="nombre_pokemon">Bellossom</p>
                        <img src="/TP-Pokedex/assets/tipos/agua.avif" alt="img_tipo">
                    </a>
                    <?php

                    if($estaLogeado){?>
                        <div class="cont_botones">
                            <a href="editar" class="btn_editar"> <img src="assets/icons/icon_edit.svg">Editar</a>
                            <a href="eliminar" class="btn_eliminar"> <img src="assets/icons/icon_delete.svg">Eliminar</a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>

        <button class="btn-new-pokemon">
            <a href="#">Nuevo pokemon</a>
        </button>
    </main>


    <?php require_once("views/footer.php")?>
</body>
</html>
