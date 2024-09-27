<?php
session_start();
require_once("database/Database.php");
$estaLogeado = false;
$errorBdd = "";
$errorBusqueda = "";
$eliminacionExitosa = isset($_GET["eliminacionExitosa"]) ? $_GET["eliminacionExitosa"] : "";
$criterioDeBusqueda = isset($_GET["criterioBusqueda"]) ? trim($_GET["criterioBusqueda"]) : "";
$pokemones = "";

if (isset($_SESSION['usuario'])){
    $estaLogeado = true;
}

$bdd = new Database();
if ($bdd->getError() != ""){
    $errorBdd = $bdd->getError();
}else{

    if ($criterioDeBusqueda != ""){
        //echo $criterioDeBusqueda;
        $pokemones = $bdd->getPorQuery(
                "SELECT * FROM `pokemon` 
                     INNER JOIN `tipo` ON `pokemon`.`id_tipo` = `tipo`.`id_tipo` 
                     WHERE `pokemon`.`id_pokemon` LIKE '%$criterioDeBusqueda%' 
                        OR `pokemon`.`nombre` LIKE '%$criterioDeBusqueda%' 
                        OR `tipo`.`nombre_tipo` LIKE '%$criterioDeBusqueda%'");

        if (empty($pokemones)){
            $pokemones = $bdd->dameTodosLosPokemones();
            $errorBusqueda = "No se encontraron resultados para: \"". $criterioDeBusqueda . "\"";
        }

    }else{
        $pokemones = $bdd->dameTodosLosPokemones();
    }
}
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/TP-Pokedex/styles/home.css">
    <script src="/TP-Pokedex/js/popupEliminarPokemon.js" defer></script>
    <title>Inicio | Pokedex</title>
</head>
<body>
    <?php require_once("views/header.php")?>


    <main>

        <section class="fondo-popup">
            <section class="pop-up">
                <img src="/TP-Pokedex/assets/icons/icon_warning.svg" alt="Ciudado" class="pop-up-check">
                <p class="pop-up-mensaje">¿Seguro desea eliminar?</p>
                <div>
                    <a href="/TP-Pokedex/index.php" class="btn_cancelar">Cancelar</a>
                    <a href="#" class="btn_aceptar">Aceptar</a>
                </div>
            </section>
        </section>


        <form class="form_buscador" action="index.php" method="get">
            <input type="search" name="criterioBusqueda" placeholder="Ingrese el nombre, tipo o número de pokemon" value="<?php echo $criterioDeBusqueda!="" ? $criterioDeBusqueda : ""?>">
            <input type="submit" value="Buscar" class="btn">
        </form>

        <?php
        if ($errorBusqueda != "") {
            echo '<div class="alert alert-danger" style="display: flex; justify-content: center; align-items: center; gap: 1em; text-align: center"> <img src="/TP-Pokedex/assets/icons/icon_error.svg" alt="Exitoso">' . $errorBusqueda . '</div>';
        }

        if ($eliminacionExitosa != ""){
            echo '<div class="alert alert-success" style="display: flex; justify-content: center; align-items: center; gap: 1em; text-align: center"> <img src="/TP-Pokedex/assets/icons/icon_check.svg" alt="Exitoso">' . $eliminacionExitosa . '</div>';
        }

        if ($errorBdd != "") {
        echo '<div class="alert alert-danger" style="display: flex; justify-content: center; align-items: center; gap: 1em; text-align: center"> <img src="/TP-Pokedex/assets/icons/icon_error.svg" alt="Exitoso">' . $errorBdd . '</div>';
        }else{?>
            <section class="contenedor_pokemones">
            <?php
                    foreach ($pokemones as $pokemon){ ?>
                        <div class="pokemon">
                            <a href="/TP-Pokedex/views/detallePokemon.php?id_pokemon=<?php echo $pokemon["id_pokemon"]?>" class="cont_1">
                                <img src="<?php echo $pokemon["imagen"]?>" alt="img_pokemon">
                            </a>
                            <div class="cont_2">
                                <a href="/TP-Pokedex/views/detallePokemon.php?id_pokemon=<?php echo $pokemon["id_pokemon"]?>" class="descripcion">
                                    <p class="numero_pokemon"><?php echo $pokemon["id_pokemon"]?></p>
                                    <p class="nombre_pokemon"><?php echo $pokemon["nombre"]?></p>
                                    <img src="/TP-Pokedex/assets/tipos/<?php echo $pokemon["nombre_tipo"]?>.avif" alt="img_tipo" title="<?php echo $pokemon["nombre_tipo"]?>">
                                </a>
                                <?php

                                if($estaLogeado){?>
                                    <div class="cont_botones">
                                        <a href="/TP-Pokedex/controller/controllerEliminarPokemon.php?id_pokemon=<?php echo $pokemon["id_pokemon"]?>" class="btn_eliminar"> <img src="assets/icons/icon_delete.svg">Eliminar</a>
                                        <a href="editar" class="btn_editar"> <img src="assets/icons/icon_edit.svg">Editar</a>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }
            } ?>
        </section>

        <div class="container_ancla">
            <a href="#arriba" class="ancla"><img src="/TP-Pokedex/assets/icons/arrowTop.svg" alt="arrowTop" title="Ir Arriba"></a>
        </div>
        <button class="btn-new-pokemon">
            <a href="#">Nuevo pokemon</a>
        </button>
    </main>


    <?php require_once("views/footer.php")?>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
